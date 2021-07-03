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
    }
    
    public function index()
    {
        $taisan = $this->taisan->select();
        $chitiettaisan = $this->chitiettaisan->select();
        $nhanvien = $this->nhanvien->select('all');
        return view('chitiettaisan.Chitiettaisan',compact('taisan','chitiettaisan','nhanvien'));
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
        $kq =$this->chitiettaisan->insert($id_chitiet,$request->loaits,$request->tents,$request->so_serial,$request->trangthai,$request->nhanvien);
        if($kq){
            if($request->taisan){
                return redirect('/taisan/'.$request->taisan);
            }
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
        return view('chitiettaisan.modal',compact('chitiet_up','taisan','nhanvien'));
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
                return redirect()->route('taisan.show',$request->detail_ts);
            }else{
                return redirect()->route('chitiettaisan.index');
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

    public function search_chitiet(Request $request){
        if($request->ajax()){
            $text=$request->text;
            $seleted =$request->seleted;
            
            $nhanvien = $this->nhanvien->select('all');
            if($text !='' || $seleted !=''){
                $chitiettaisan = $this->chitiettaisan->search_chitiet($text,$seleted);
            }else{
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
