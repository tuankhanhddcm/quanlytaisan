<?php

namespace App\Http\Controllers;

use App\Models\Chitietphieu;
use Illuminate\Http\Request;
use App\Models\Nhanvien;
use App\Models\Thanhly;
use App\Models\Phongban;
use App\Models\Chitiettaisan;
use Carbon\Carbon;
use Alert;
use Illuminate\Support\Facades\File;

class ThanhlyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $thanhly;
    protected $nhanvien;
    protected $phongban;
    protected $chitiettaisan;
    protected $chitietphieu;

    public function __construct()
    {
        $this->nhanvien = new Nhanvien;
        $this->thanhly = new Thanhly;
        $this->phongban = new Phongban;
        $this->chitiettaisan = new Chitiettaisan;
        $this->chitietphieu = new Chitietphieu;
    }

    public function index()
    {
        $nhanvien = $this->nhanvien->select();
        $thanhly = $this->thanhly->select();
        return view('thanhly.index',compact('nhanvien','thanhly'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $phongban = $this->phongban->select();
        $nhanvien = $this->nhanvien->select();
        return view('thanhly.themthanhly',compact('phongban','nhanvien'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $row = $this->thanhly->select()->total();
        $max_id = $this->thanhly->max_id('ma_thanhly','PTL');
        if ($max_id !== null) {
            $id = (int)(str_replace('PTL','', $max_id->ma_thanhly)) + 1;
        } else {
            $id = $row + 1;
        }
        if ($id < 10) {
            $ma_thanhly = 'PTL00000' . ($id);
        } else if ($id < 100) {
            $ma_thanhly = 'PTL0000' . ($id);
        } else if ($id < 1000) {
            $ma_thanhly = 'PTL000' . ($id);
        } else if ($id < 10000) {
            $ma_thanhly = 'PTL00' . ($id);
        } else if ($id < 100000) {
            $ma_thanhly = 'PTL0' . ($id);
        } else if ($id < 1000000) {
            $ma_thanhly = 'PTL' . ($id);
        }else{
            $ma_thanhly = 'PTL' . ($id+1);
        }
        $file = $request->file_pdf;
        $ngay_thanhly = Carbon::parse($request->ngaylap);
        $kq = $this->thanhly->insert($ma_thanhly,$request->nhanvien,$request->phongban,$request->lydo,$file->getClientOriginalName(),$ngay_thanhly);
        if($kq){
            $file->move('phieuthanhly',$file->getClientOriginalName());
            $i=0;
            foreach($request->ma_chitiet as $val){
                $ketqua = $this->chitietphieu->insert(null,$ma_thanhly,null,$val,null);
                if($ketqua){
                    $up_tt = $this->chitiettaisan->update_tt($val,2);
                    $result = $this->chitietphieu->update_tinhtrang_thanhly($val,$ma_thanhly,$request->tinhtrang[$i]); 
                    $i++;
                }
            }
            if($result){
                Alert::alert()->success('Thêm phiếu thanh lý thành công')->autoClose(5000);
                return redirect()->route('thanhly.create');
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
        
        $chitiettaisan =  $this->thanhly->chitietthanhly($id);
        $thanhly = $this->thanhly->find($id);
        return view('thanhly.chitietthanhly',compact('thanhly','chitiettaisan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $thanhly = $this->thanhly->find($id);
        $nhanvien = $this->nhanvien->select('all');
        $phongban = $this->phongban->select('all');
        $chitiet = $this->chitiettaisan->table_join()->join('chitietphieu','chitietphieu.ma_chitiet','=','chitiettaisan.ma_chitiet')->where('chitietphieu.ma_thanhly',$id)->select('chitiettaisan.*','taisan.ten_ts','phongban.ten_phong','chitietphieu.tinhtrang')->get();
        return view('thanhly.themthanhly',compact('thanhly','phongban','nhanvien','chitiet'));
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
        
        $ngay_thanhly = Carbon::parse($request->ngaylap);
        $thanhly = $this->thanhly->find($id);
        $path = public_path().'/phieuthanhly/'.$thanhly->phieu;
        if(File::exists($path)){
            unlink($path);
        }
        $file = $request->file_pdf;
        
        $kq = $this->thanhly->updat_thanhly($id,$request->nhanvien,$request->phongban,$request->lydo,$file->getClientOriginalName(),$ngay_thanhly);
        if($kq){
            $file->move('phieuthanhly',$file->getClientOriginalName());
            $chitiet = $this->chitiettaisan->table_join()->join('chitietphieu','chitietphieu.ma_chitiet','=','chitiettaisan.ma_chitiet')->where('chitietphieu.ma_thanhly',$id)->select('chitiettaisan.*','taisan.ten_ts','phongban.ten_phong','chitietphieu.tinhtrang')->get();
            foreach($chitiet as $val){
                $up_ct = $this->chitiettaisan->update_tt($val->ma_chitiet,0);
                
            }
            $delete_ct_phieu = $this->chitietphieu->delete_phieu('ma_thanhly',$id);
            if($delete_ct_phieu){
                $i=0;
                foreach($request->ma_chitiet as $v){
                    $insert_ct_phieu = $this->chitietphieu->insert(null,$id,null,$v,null,null,null);
                    if($insert_ct_phieu){
                        $up_ct = $this->chitiettaisan->update_tt($v,2);
                        $up_tt = $this->chitietphieu->update_tinhtrang_thanhly($v,$id,$request->tinhtrang[$i]);
                        $i++;
                        
                        
                    }
                }
                if($up_tt){
                    Alert::alert()->success('Sửa phiếu thanh lý thành công!!!');
                    return redirect()->route('thanhly.index');
                }
            }
            
        }
        
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function more_ts(Request $request){
        if($request->ajax()){
            $sl = $request->sl;
            $taisan = $this->chitiettaisan->ctOfphong($request->ma_phong);
            if($sl >1){
                $html ='';
                for($i=0;$i<$sl;$i++){
                    $a = $i+1;
                    $html .= view('thanhly.more_ts',compact('taisan','a'));
                }
                return $html;
            }else{
                $a =1;
                return view('thanhly.more_ts',compact('taisan','a'));
            }
        }
    }
    public function show_phieu($id){
        $phieu = $id;
        return view('thanhly.viewpdf',compact('phieu'));
    }
    public function in_phieu($id){
        $thanhly = $this->thanhly->find($id);
        $file = public_path('phieuthanhly/'.$thanhly->phieu);
        // var_dump($bangiao);
        return response()->download($file);
    }
}
