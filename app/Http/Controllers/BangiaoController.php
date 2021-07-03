<?php

namespace App\Http\Controllers;

use App\Models\Bangiao;
use App\Models\Chitietphieu;
use Illuminate\Http\Request;
use App\Models\Chitiettaisan;
use App\Models\Nhacungcap;
use App\Models\Nhanvien;
use App\Models\Phongban;
use App\Models\Taisan;
use Svg\Tag\Rect;

class BangiaoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $phongban;
    protected $nhacungcap;
    protected $taisan;
    protected $chitiettaisan;
    protected $nhanvien;
    protected $bangiao;
    protected $chitietphieu;

    public function __construct()
    {
        $this->middleware('login');
        $this->taisan = new Taisan;
        $this->chitiettaisan = new Chitiettaisan;
        $this->nhanvien = new Nhanvien;
        $this->phongban = new Phongban;
        $this->bangiao = new Bangiao;
        $this->chitietphieu = new Chitietphieu;
    }

    public function index()
    {
        $nhanvien = $this->nhanvien->select('all');
        $bangiao = $this->bangiao->select();
        return view('bangiao.index',compact('nhanvien','bangiao'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $taisan = $this->taisan->select('','all');
        $phongban = $this->phongban->select('all');
        $nhanvien = $this->nhanvien->select();
        return view('bangiao.thembangiao',compact('phongban','nhanvien','taisan'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $row = $this->bangiao->select()->total();
        $max_id = $this->bangiao->max_id('ma_bangiao','PBG');
        if ($max_id !== null) {
            $id = (int)(str_replace('PBG','', $max_id->ma_bangiao)) + 1;
        } else {
            $id = $row + 1;
        }
        if ($id < 10) {
            $ma_bangiao = 'PBG00000' . ($id);
        } else if ($id < 100) {
            $ma_bangiao = 'PBG0000' . ($id);
        } else if ($id < 1000) {
            $ma_bangiao = 'PBG000' . ($id);
        } else if ($id < 10000) {
            $ma_bangiao = 'PBG00' . ($id);
        } else if ($id < 100000) {
            $ma_bangiao = 'PBG0' . ($id);
        } else if ($id < 1000000) {
            $ma_bangiao = 'PBG' . ($id);
        }else{
            $ma_bangiao = 'PBG' . ($id+1);
        }
        $file = $request->file_pdf;
        $kq = $this->bangiao->insert($ma_bangiao,$request->nv_giao,$request->nv_nhan,$request->lydo,$file->getClientOriginalName(),$request->ngaygiao);
        if($kq){
            $file->move('phieubangiao',$file->getClientOriginalName());
            foreach($request->ma_chitiet as $val){
                $ketqua = $this->chitietphieu->insert($ma_bangiao,null,null,$val,null);
                if($ketqua){
                    foreach($request->tinhtrang as $tt){
                        $result = $this->chitietphieu->update_tinhtrang_bangiao($val,$ma_bangiao,$tt);
                        
                    }
                }
            }
            if($result){
                return redirect()->route('bangiao.create');
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
        $bangiao = $this->bangiao->find($id);
        $nhanvien = $this->nhanvien->select('all');
        $chitiet = $this->chitietphieu->select_bangiao('',$id);
        return view('bangiao.chitietbangiao',compact('nhanvien','bangiao','chitiet'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
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
            $taisan = $this->taisan->tsOfphong($request->ma_phong);
            $phongban = $this->phongban->select('all');
            $nhanvien = $this->nhanvien->select();
            if($sl >1){
                $html ='';
                for($i=0;$i<$sl;$i++){
                    $a = $i+1;
                    $html .= view('bangiao.more_ts',compact('taisan','phongban','nhanvien','a'));
                }
                return $html;
            }else{
                $a =1;
                return view('bangiao.more_ts',compact('taisan','phongban','nhanvien','a'));
            }
        }
    }

    public function loc_nv(Request $request){
        if($request->ajax()){
            $nv = $this->nhanvien->nvOfphong($request->id);
            if($nv){
                $kq='<option value="" selected>--Chọn nhân viên--</option>';
                foreach($nv as $val){
                    $kq .='<option value="'.$val->ma_nv.'">'.$val->ten_nv.'</option>';
                }
                return $kq;
            }
        }
    }
    public function loc_ts(Request $request){
        if($request->ajax()){
            $ts = $this->taisan->tsOfphong($request->id);
            if($ts){
                $kq='<option value="" selected>--Chọn tài sản--</option>';
                foreach($ts as $val){
                    $kq .='<option value="'.$val->ma_ts.'">'.$val->ten_ts.'</option>';
                }
                return $kq;
            }
        }
    }
    public function loc_chitiet(Request $request){
        if($request->ajax()){
            $chitiet = $this->chitiettaisan->ctOfphong($request->id);
            if($chitiet){
                $kq='<option value="" selected>--Chọn chi tiết tài sản--</option>';
                foreach($chitiet as $val){
                    $kq .='<option value="'.$val->ma_chitiet.'">'.$val->ten_chitiet.'</option>';
                }
                return $kq;
            }
        }
    }

    public function show_phieu($id){
        $phieu = $id;
        return view('bangiao.viewpdf',compact('phieu'));
    }

    public function search(Request $request){
        if($request->ajax()){
            $bangiao = $this->bangiao->select();
            if($request->text !='' ||$request->seleted !=''){
                $bangiao= $this->bangiao->search($request->text,$request->seleted);
            }
            $nhanvien = $this->nhanvien->select('all');
            return view('bangiao.list_phieubangiao',compact('nhanvien','bangiao'));
        }
    }
    
}
