<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Chitiettaisan;
use App\Models\Nhacungcap;
use App\Models\Nhanvien;
use App\Models\Phongban;
use App\Models\Taisan;

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
        return view('bangiao.index');
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
        //
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
    
}
