<?php

namespace App\Http\Controllers;

use App\Models\Chucvu;
use App\Models\Nhanvien;
use App\Models\Phongban;
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
    public function __construct()
    {
        $this->middleware('login');
        $this->phongban = new Phongban;
        $this->chucvu = new Chucvu;
        $this->nhanvien = new Nhanvien;
    }
    public function index()
    {
        $phongban = $this->phongban->select();
        $chucvu = $this->chucvu->select();   
        $nhanvien = $this->nhanvien->select(); 
        return view('layout.Nhanvien',compact('phongban','chucvu','nhanvien'));
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
        //
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
}
