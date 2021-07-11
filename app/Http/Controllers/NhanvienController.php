<?php

namespace App\Http\Controllers;

use App\Models\Chitiettaisan;
use App\Models\Chucvu;
use App\Models\Nhanvien;
use App\Models\Phongban;
use App\Models\Taisan;
use Illuminate\Http\Request;

class NhanvienController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $phongban;
    protected $chucvu;
    protected $nhanvien;
    protected $chitiettaisan;
    protected $taisan;
    public function __construct()
    {
        $this->middleware('login');
        $this->phongban = new Phongban;
        $this->chucvu = new Chucvu;
        $this->nhanvien = new Nhanvien;
        $this->chitiettaisan = new Chitiettaisan;
        $this->taisan = new Taisan;
    }
    public function index()
    {
        $phongban = $this->phongban->select();
        $chucvu = $this->chucvu->select();   
        $nhanvien = $this->nhanvien->select(); 
        $sl = $this->chitiettaisan->sl_ts_nv();
        return view('nhanvien.index',compact('phongban','chucvu','nhanvien','sl'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $row = $this->nhanvien->select()->total();
        $max_id = $this->nhanvien->max_id('ma_nv','NV');
        if ($max_id !== null) {
            $id = (int)(str_replace('NV','', $max_id->ma_nv)) + 1;
        } else {
            $id = $row + 1;
        }
        if ($id < 10) {
            $ma_nv = 'NV00000' . ($id);
        } else if ($id < 100) {
            $ma_nv = 'NV0000' . ($id);
        } else if ($id < 1000) {
            $ma_nv = 'NV000' . ($id);
        } else if ($id < 10000) {
            $ma_nv = 'NV00' . ($id);
        } else if ($id < 100000) {
            $ma_nv = 'NV0' . ($id);
        } else if ($id < 1000000) {
            $ma_nv = 'NV' . ($id);
        }
        $date = date("Y-m-d H:i:s", time());
        $kq =$this->nhanvien->insert($ma_nv,$request->ten_nv,$request->sdt,$request->email,$request->diachi,$date,$request->ma_phong,$request->ma_chucvu);
        if($kq){
            return redirect('/nhanvien');
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
        $nv = $this->nhanvien->find($id);
        $sl = $this->chitiettaisan->sl_ts_nv();
        $nv->soluong =0;
        foreach($sl as $val){
            if($nv->ma_nv ==$val->ma_nv){
                $nv->soluong =$val->soluong;
            }
        }
        $chitiettaisan = $this->chitiettaisan->ctOfnv($nv->ma_nv);
        return view('nhanvien.detail_nhanvien',compact('nv','chitiettaisan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $nv = $this->nhanvien->find($id);
        $cv = $this->chucvu->get();
        $pb = $this->phongban->get();
        return view('nhanvien.modal_update_nhanvien',compact('nv','cv','pb'));
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
        $date = date("d-m-Y");
        $this->nhanvien->update_nv($id,$request->ten_nv,$request->sdt,$request->email,$request->diachi,$request->ma_phong,$date,$request->ma_chucvu);
        return redirect('/nhanvien');
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
    public function search(Request $request)
    {
        $text = $request->text;
        $seleted =$request->seleted;
        if($text!=''|| $seleted !=''){
            $nhanvien = $this->nhanvien->search_nv($text,$seleted);
            
        }else{
            $nhanvien = $this->nhanvien->select();
        }
        $sl = $this->chitiettaisan->sl_ts_nv();
        return view('nhanvien.list_nhanvien',compact('nhanvien','sl'));
    }
}
