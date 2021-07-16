<?php

namespace App\Http\Controllers;

use App\Models\Chitiettaisan;
use App\Models\Nhacungcap;
use App\Models\Nhanvien;
use App\Models\Phongban;
use App\Models\Taisan;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Types\This;
use Svg\Tag\Rect;
use Alert;
class ChitiettaisanController extends Controller
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

    public function __construct()
    {
        $this->middleware('login');
        $this->taisan = new Taisan;
        $this->chitiettaisan = new Chitiettaisan;
        $this->nhanvien = new Nhanvien;
        $this->phongban = new Phongban;
    }
    
    public function index()
    {
        $taisan = $this->taisan->select('','all');
        $chitiettaisan = $this->chitiettaisan->select();
        $nhanvien = $this->nhanvien->select('all');
        $phongban = $this->phongban->select('all');
        return view('chitiettaisan.Chitiettaisan',compact('taisan','chitiettaisan','nhanvien','phongban'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $phongban = $this->phongban->select();
        $taisan = $this->taisan->select();
        $nhanvien = $this->nhanvien->select();
        return view('chitiettaisan.insert',compact('phongban','nhanvien','taisan'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $row = $this->chitiettaisan->select()->total();
        $max_id = $this->chitiettaisan->max_id('ma_chitiet','CTS');
        if ($max_id !== null) {
            $id = (int)(str_replace('CTS','', $max_id->ma_chitiet)) + 1;
        } else {
            $id = $row + 1;
        }
        if ($id < 10) {
            $id_chitiet = 'CTS00000' . ($id);
        } else if ($id < 100) {
            $id_chitiet = 'CTS0000' . ($id);
        } else if ($id < 1000) {
            $id_chitiet = 'CTS000' . ($id);
        } else if ($id < 10000) {
            $id_chitiet = 'CTS00' . ($id);
        } else if ($id < 100000) {
            $id_chitiet = 'CTS0' . ($id);
        } else if ($id < 1000000) {
            $id_chitiet = 'CTS' . ($id);
        }
        $kq =$this->chitiettaisan->insert($id_chitiet,$request->loaits,$request->tents,$request->phongban,$request->so_serial,$request->trangthai,$request->nhanvien);
        if($kq){
            if($request->taisan){
                Alert::alert()->success('Thêm chi tiết tài sản thành công!!!')->autoClose(5000);
                return redirect('/taisan/'.$request->taisan);
            }
            Alert::alert()->success('Thêm chi tiết tài sản thành công!!!')->autoClose(5000);
            return redirect('/chitiettaisan');
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
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $taisan = $this->taisan->select('','all');
        $chitiet_up = $this->chitiettaisan->show_id($id);
        $nhanvien = $this->nhanvien->select('all',$chitiet_up->ma_phong);
        $phongban = $this->phongban->select('all');
        return view('chitiettaisan.modal',compact('chitiet_up','taisan','nhanvien','phongban'));
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
        $kq = $this->chitiettaisan->update_chitiet($id,$request->loaits_up,$request->tents_up,$request->so_serial_up,$request->trangthai_up,$request->nhanvien_up);
        if($kq){
            if($request->detail_ts !=''){
                Alert::alert()->success('Sửa chi tiết tài sản thành công!!!')->autoClose(5000);
                return redirect('taisan/'.$request->detail_ts.'?page='.$request->page);
            }else{
                Alert::alert()->success('Sửa chi tiết tài sản thành công!!!')->autoClose(5000);
                return redirect('chitiettaisan?page='.$request->page);
            }
           
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        $chitiet = $this->chitiettaisan->show_id($id);
        $sl_ts = $this->taisan->sl_taisan();
        $out = false;
        if($chitiet->trangthai == 2){
            foreach($sl_ts as $val){
                if($val->ma_ts == $chitiet->ma_ts){
                    if($val->soluong <=1){
                        $ts = $this->taisan->update_deleted($val->ma_ts,1);
                        $out =true;
                    }else{
                        $kq = $this->chitiettaisan->delete_chitiet($id);
                        $out=true;
                    }
                    
                    break;
                }
    
            }
        }
        return $out;
        
    }

    public function search_chitiet(Request $request){
        if($request->ajax()){
            $text=$request->text;
            $seleted =$request->seleted;
            $ma_phong = $request->ma_phong;
            $nhanvien = $this->nhanvien->select('all');
            $ma_ts =$request->ma_ts;
            $ma_nv =$request->ma_nv;
            if($text !='' || $seleted !='' || $ma_phong !=''){
                $chitiettaisan = $this->chitiettaisan->search_chitiet($text,$seleted,$ma_phong);
            }elseif($ma_ts !=''){
                $chitiettaisan =$this->chitiettaisan->select($ma_ts);
                $nhanvien = $this->nhanvien->nvOftaisan($ma_ts);
                $phongban = $this->phongban->phongOfts($ma_ts);
                $taisan = $this->taisan->show_ts($ma_ts);
                return view('taisan.list_chitiet',compact('chitiettaisan','nhanvien','phongban','taisan'));
            }elseif($ma_nv !=''){
                $chitiettaisan = $this->chitiettaisan->ctOfnv($ma_nv);
                $nhanvien = $this->nhanvien->find($ma_nv);
                return view('chitiettaisan.list_chitiet',compact('chitiettaisan','nhanvien'));
            }
            else{
                $chitiettaisan = $this->chitiettaisan->select();
            }
            return view('chitiettaisan.list_chitiet',compact('chitiettaisan','nhanvien'));
        }
    }

    public function loc_nvofphong(Request $request){
        if($request->ajax()){
            $ma_ts =$request->ma_ts;
            $nv = $this->nhanvien->nvOftaisan($ma_ts);
            if($nv){
                $kq='<option value="" selected>--Chọn nhân viên--</option>';
                foreach($nv as $val){
                    $kq .='<option value="'.$val->ma_nv.'">'.$val->ten_nv.'</option>';
                }
                return $kq;
            }
        }
    }
}
