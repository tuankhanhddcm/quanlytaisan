<?php

namespace App\Http\Controllers;

use App\Exports\TaisanExport;
use App\Models\Chitiettaisan;
use App\Models\Loaitaisan;
use App\Models\LoaiTSCD;
use App\Models\Nhacungcap;
use App\Models\Nhanvien;
use App\Models\Phongban;
use App\Models\Taisan;
use App\Models\Tieuhao;
use Carbon\Carbon;
use DateTime;
use Illuminate\Http\Request;
use PhpOffice\PhpWord\TemplateProcessor;
use Maatwebsite\Excel\Facades\Excel;

class TaisanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
  
    public $loaitaisan ;
    public $taisan;
    protected $nhacungcap;
    protected $phongban;
    protected $chitiettaisan;
    protected $tieuhao;
    protected $loaiTSCD;
    protected $nhanvien;
    public function __construct()
    {
        $this->loaitaisan= new Loaitaisan;
        $this->taisan = new Taisan;
        $this->nhacungcap= new Nhacungcap;
        $this->phongban = new Phongban;
        $this->chitiettaisan = new Chitiettaisan;
        $this->tieuhao = new Tieuhao;
        $this->loaiTSCD = new LoaiTSCD;
        $this->nhanvien = new Nhanvien;
        $this->middleware('login');
    }
    
    public function index()
    {
        $ts = $this->taisan->select();
        $loai = $this->loaiTSCD->select('all');
        $phongban = $this->phongban->select('all');
        $phongtaisan = $this->taisan->phong_taisan();
        return view('taisan.index',[
                    'taisan'=>$ts,
                    'loaits' =>$loai,
                    'phongban' =>$phongban,
                    'phongts'=>$phongtaisan
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
        $loai = $this->loaiTSCD->select('all');
        $phongban = $this->phongban->select();
        $nhacungcap = $this->nhacungcap->select();
        return view('taisan.insert',[
            'loaits' =>$loai,
            'nhacungcap'=>$nhacungcap,
            'phongban'=> $phongban
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $row = $this->taisan->select()->total();
        $max_id = $this->taisan->max_id('ma_ts','TS');
        if ($max_id !== null) {
            $id = (int)(str_replace('TS','', $max_id->ma_ts)) + 1;
        } else {
            $id = $row + 1;
        }
        if ($id < 10) {
            $ma_ts = 'TS00000' . ($id);
        } else if ($id < 100) {
            $ma_ts = 'TS0000' . ($id);
        } else if ($id < 1000) {
            $ma_ts = 'TS000' . ($id);
        } else if ($id < 10000) {
            $ma_ts = 'TS00' . ($id);
        } else if ($id < 100000) {
            $ma_ts = 'TS0' . ($id);
        } else if ($id < 1000000) {
            $ma_ts = 'TS' . ($id);
        }
        $ngay_mua=Carbon::parse($request->ngay_mua);
        $ngay_tang = Carbon::parse($request->ngaytang);
        $ngay_sd = Carbon::parse($request->ngaysd);
        $kq =$this->taisan->insert($ma_ts,$request->tents,$request->ma_loai,$request->ngia,$request->ncc,$ngay_mua
        ,$request->nsx,$request->nuoc_sx,$ngay_sd,$ngay_tang);
        if($kq){
            if($request->sl !=''){
                for($i=0;$i<$request->sl;$i++){
                    $row = $this->chitiettaisan->select()->total();
                    $max_id = $this->chitiettaisan->max_id('ma_chitiet','CTS');
                    if ($max_id !== null) {
                        $id = (int)(str_replace('CTS','', $max_id->ma_chitiet)) + 1;
                    } else {
                        $id = $row + 1;
                    }
                    if ($id < 10) {
                        $ma_chitiet = 'CTS00000' . ($id);
                    } else if ($id < 100) {
                        $ma_chitiet = 'CTS0000' . ($id);
                    } else if ($id < 1000) {
                        $ma_chitiet = 'CTS000' . ($id);
                    } else if ($id < 10000) {
                        $ma_chitiet = 'CTS00' . ($id);
                    } else if ($id < 100000) {
                        $ma_chitiet = 'CTS0' . ($id);
                    } else if ($id < 1000000) {
                        $ma_chitiet = 'CTS' . ($id);
                    }
                    $kq=$this->chitiettaisan->insert($ma_chitiet,$ma_ts,$request->tents.' ('.(1+$i).')',$request->phongban);
                }
                if($kq){
                    return redirect('/taisan/create');
                }
            }
            
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $taisan = $this->taisan->show_ts($id);
        $chitiettaisan = $this->chitiettaisan->select($id);
        $nhanvien = $this->nhanvien->nvOftaisan($id);
        if($taisan->deleted ==0){
            $phongban = $this->phongban->select('all');
        }else{
            $phongban = $this->phongban->phongOfts($id);
        }
        $phongts = $this->taisan->phong_taisan();
        return view('taisan.detail_taisan',[
            'taisan'=>$taisan,
            'chitiettaisan'=>$chitiettaisan,
            'nhanvien' =>$nhanvien,
            'phongban'=>$phongban,
            'phongts'=>$phongts
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $taisan = $this->taisan->show_ts($id);
        $loaits = $this->loaiTSCD->select('all');
        $phongban = $this->phongban->select();
        $nhacungcap = $this->nhacungcap->select();
        $taisan->ngay_mua = date('d-m-Y', strtotime($taisan->ngay_mua));
        $taisan->ngay_ghi_tang = date('d-m-Y', strtotime($taisan->ngay_ghi_tang));
        $taisan->ngay_sd = date('d-m-Y', strtotime($taisan->ngay_sd));
        return view('taisan.insert',compact('taisan','phongban','nhacungcap','loaits'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $ngay_mua=Carbon::parse($request->ngay_mua);
        $ngay_tang = Carbon::parse($request->ngaytang);
        $ngay_sd = Carbon::parse($request->ngaysd);
        $kq =$this->taisan->update_ts($id,$request->tents,$request->ma_loai,$request->ngia,$request->ncc,$ngay_mua
        ,$request->nsx,$request->nuoc_sx,$ngay_sd,$ngay_tang);
        
        if($kq){
            return redirect()->route('taisan.index');
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update_delete(Request $request){
        if($request->ajax()){
            $xoats = $this->taisan->update_deleted($request->ma_ts,$request->delete);
            if($xoats){
                return true;
            }
            return false;
        }
    }


    public function destroy(Request $request)
    {
        if($request->ajax()){
            $xoa_chitiet = $this->chitiettaisan->delete_chitiet_of_taisan($request->ma_ts);
            if($xoa_chitiet){
                $xoats = $this->taisan->delete_ts($request->ma_ts);
                return true;
            }
            return false;
        }
    }

    public function search_ts(Request $request){
        if($request->ajax()){
            $text=$request->text;
            $seleted =$request->seleted;
            $ma_phong =$request->ma_phong;
            $phongts = $this->taisan->phong_taisan();
            $ma_loai = $request->ma_loai;
            $deleted = $request->deleted;
            if($text !='' || $seleted !='' || $ma_phong !='' || $deleted !=null){
                $taisan = $this->taisan->search_taisan($text,$seleted,$ma_phong,$deleted);
            }elseif($ma_loai !=''){
                $taisan = $this->taisan->select($ma_loai);
            }elseif($request->phongban !=''){
                $taisan = $this->taisan->sl_taisan_phong($request->phongban);
                return view('taisan.list_taisan',compact('taisan'));
            }else{
                $taisan = $this->taisan->select();
            }
            return view('taisan.list_taisan',compact('taisan','phongts'));
        }
    }


    public function in_theTSCD(Request $request){
        if($request->ajax()){
            $file = new TemplateProcessor('theTSCD/theTSCD.docx');
            $file->setValue('ten_ts',$request->tents);
            $file->setValue('ngay',Carbon::now()->day);
            $file->setValue('thang',Carbon::now()->month);
            $file->setValue('nam',Carbon::now()->year);
            $file->setValue('nuoc_sx',$request->nuoc_sx);
            $file->setValue('nam_sx',$request->nam_sx);
            $file->setValue('phong',$request->phong);
            $file->setValue('n',$request->nam_sd);
            $file->setValue('ngia',number_format($request->ngia).'đ');
            $file->saveAS('thetaisan.docx');
            return response()->download('thetaisan.docx')->deleteFileAfterSend(true);
        }
    }
    public function in_theTSCD_id($id){
        $taisan = $this->taisan->show_ts($id);
        $phongtaisan = $this->taisan->phong_taisan();
        $ten_phong='';
        foreach($phongtaisan as $item){
            if($taisan->ma_ts == $item->ma_ts){
                $ten_phong .= $item->ten_phong .', ';
            }
        }
        $ten_phong = chop($ten_phong,', ');
        if(isset($taisan)){
            $file = new TemplateProcessor('theTSCD/theTSCD.docx');
            $file->setValue('ten_ts',$taisan->ten_ts);
            $file->setValue('ngay',Carbon::now()->day);
            $file->setValue('thang',Carbon::now()->month);
            $file->setValue('nam',Carbon::now()->year);
            $file->setValue('nuoc_sx',$taisan->nuoc_sx);
            $file->setValue('nam_sx',$taisan->nam_sx);
            $file->setValue('phong',$ten_phong);
            $file->setValue('n',date('Y',strtotime($taisan->ngay_sd)));
            $file->setValue('ngia',number_format($taisan->nguyengia).'đ');
            $file->saveAS('thetaisan ('.$taisan->ten_ts.').docx');
            return response()->download('thetaisan ('.$taisan->ten_ts.').docx')->deleteFileAfterSend(true);
        }
    }

    public function modal_chitiet(Request $request, $id){
        if($request->ajax()){
            $chitiet_up = $this->chitiettaisan->show_id($id);
            $nhanvien = $this->nhanvien->nvOfphong($chitiet_up->ma_phong);
            $phongban = $this->phongban->phongOfts($request->ma_ts);
            $taisan = $this->taisan->show_ts($request->ma_ts);
            return view('taisan.modal_chitiet',compact('chitiet_up','nhanvien','taisan','phongban'));
        }
        
    }
    public function export(Request $request) 
    {  
        if($request->ajax()){
            $ma_phong = $request->ma_phong;
            $phong='';
            if($ma_phong !=''){
                $taisan =$this->taisan->export_tsOfphong($ma_phong);
            }else{
                $taisan = $this->taisan->select('','all');
                $phong = $this->taisan->phong_taisan();
            }
            return Excel::download(new TaisanExport($taisan,$phong), 'taisan.xlsx');
        }

        
    }
}
