<?php

namespace App\Http\Controllers;

use App\Models\Chitietphieu;
use App\Models\Kiemke;
use App\Models\Nhanvien;
use App\Models\Phongban;
use App\Models\Taisan;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\KiemkeExport;

class KiemkeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $taisan ;
    protected $phongban ;
    protected $nhanvien;
    protected $kiemke;
    protected $chitietphieu;
    public function __construct()
    {
        $this->middleware('login');
        $this->taisan = new Taisan;
        $this->phongban = new Phongban;
        $this->nhanvien = new Nhanvien;
        $this->kiemke = new Kiemke;
        $this->chitietphieu = new Chitietphieu;
    }


    public function index()
    {
        $kiemke = $this->kiemke->select();
        $phongban = $this->phongban->select('all');
        return view('kiemke.index',compact('kiemke','phongban'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $phongban = $this->phongban->select('all');
        $nhanvien = $this->nhanvien->select('all');
        return view('kiemke.themkiemke',compact('phongban','nhanvien'));
    }


    public function list_taisan(Request $request){
        if($request->ajax()){
            $taisan = $this->taisan->export_tsOfphong($request->ma_phong);
            return view('kiemke.list_taisan',compact('taisan'));
        }
        

    }

    public function loc_nv(Request $request){
        if($request->ajax()){
            $nhanvien = $this->nhanvien->find($request->ma_nv);
            return $nhanvien->ten_chucvu;
        }
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $row = $this->kiemke->select()->total();
        $max_id = $this->kiemke->max_id('ma_kiemke','PKK');
        if ($max_id !== null) {
            $id = (int)(str_replace('PKK','', $max_id->ma_kiemke)) + 1;
        } else {
            $id = $row + 1;
        }
        if ($id < 10) {
            $ma_kiemke = 'PKK00000' . ($id);
        } else if ($id < 100) {
            $ma_kiemke = 'PKK0000' . ($id);
        } else if ($id < 1000) {
            $ma_kiemke = 'PKK000' . ($id);
        } else if ($id < 10000) {
            $ma_kiemke = 'PKK00' . ($id);
        } else if ($id < 100000) {
            $ma_kiemke = 'PKK0' . ($id);
        } else if ($id < 1000000) {
            $ma_kiemke = 'PKK' . ($id);
        }else{
            $ma_kiemke = 'PKK' . ($id+1);
        }
        $mang =[];
        foreach($request->taisan as $k=> $ma_ts){
            $mang[$k]['taisan'] =$ma_ts;
            
        }
        foreach($request->soluongkiemke as $k=> $sl){
            $mang[$k]['soluong'] =$sl;
        }
        $date = Carbon::create($request->ngaykk);
        $kq = $this->kiemke->insert($ma_kiemke,$request->dot_kk,$date,$request->phongban,$request->ghichu);
        if($kq){
            foreach($request->nv_kk as $val){
                $k = $this->kiemke->insert_bankiemke($ma_kiemke,$val);
            }
            foreach($mang as $val){
                $r = $this->chitietphieu->insert(null,null,$ma_kiemke,null,null,$val['soluong'],$val['taisan']);
            }
            if($k && $r){
                return redirect()->route('kiemke.index');
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
        $phieukk = $this->kiemke->find($id);
        $nv = $this->kiemke->nv_kiemke($id);
        $taisan = $this->taisan->export_tsOfphong($phieukk->ma_phong);
        $chitiet = $this->chitietphieu->select_kiemke($id);
        return view('kiemke.chitietkiemke',compact('phieukk','nv','taisan','chitiet'));
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
    public function export($id) 
    {  
        $kk = $this->kiemke->find($id);
        $taisan = $this->taisan->export_tsOfphong($kk->ma_phong);
        $kiemke = $this->kiemke->nv_kiemke($id);
        $chitiet = $this->chitietphieu->select_kiemke($id);
        return Excel::download(new KiemkeExport($taisan,$kiemke,$kk->ngay_kiemke,$chitiet), 'kiemke.xlsx');

        
    }
}
