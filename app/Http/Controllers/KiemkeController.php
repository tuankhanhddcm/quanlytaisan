<?php

namespace App\Http\Controllers;

use App\Exports\DstaisankiemkeExport;
use App\Models\Chitietphieu;
use App\Models\Kiemke;
use App\Models\Nhanvien;
use App\Models\Phongban;
use App\Models\Taisan;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\KiemkeExport;
use Alert;

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
                Alert::alert()->success('Thêm phiếu kiểm kê thành công!!!')->autoClose(5000);
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
        $ngaykk = Carbon::parse($phieukk->ngay_kiemke)->year;
        $taisan = $this->taisan->export_tsOfphong($phieukk->ma_phong);
            foreach($taisan as $val){
                $ngaymua = Carbon::parse($val->ngay_mua)->year;
                $nam = $ngaykk-$ngaymua;
                if( $nam <= $val->thoi_gian_sd){
                    $val->giatri = ($val->muc_tieuhao/100)*$val->nguyengia*($val->thoi_gian_sd-$nam);
                }
            }
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
        $phongban = $this->phongban->select();
        $nhanvien = $this->nhanvien->select();
        $kiemke = $this->kiemke->find($id);
        $nv_kiemke = $this->kiemke->nv_kiemke($id);
        $taisan = $this->taisan->export_tsOfphong($kiemke->ma_phong);
        $chitiet= $this->chitietphieu->select_kiemke($id);
        $ngaykk = Carbon::parse($kiemke->ngay_kiemke)->year;
        foreach($taisan as $val){
            $ngaymua = Carbon::parse($val->ngay_mua)->year;
            $nam = $ngaykk-$ngaymua;
            if( $nam <= $val->thoi_gian_sd){
                $val->giatri = ($val->muc_tieuhao/100)*$val->nguyengia*($val->thoi_gian_sd-$nam);
            }
        }
        return view('kiemke.themkiemke',compact('kiemke','phongban','nhanvien','nv_kiemke','taisan','chitiet'));
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
        $mang =[];
        foreach($request->taisan as $k=> $ma_ts){
            $mang[$k]['taisan'] =$ma_ts;
            
        }
        foreach($request->soluongkiemke as $k=> $sl){
            $mang[$k]['soluong'] =$sl;
        }
        $date = Carbon::create($request->ngaykk);
        $kq = $this->kiemke->update_kiemke($id,$request->dot_kk,$date,$request->phongban,$request->ghichu);
        if($kq){
            $del = $this->kiemke->delete_bankk($id);
            if($del){
                foreach($request->nv_kk as $val){
                    $k = $this->kiemke->insert_bankiemke($id,$val);
                }
            }
            $xoa = $this->chitietphieu->delete_phieu('ma_kiemke',$id);
            if($xoa){
                foreach($mang as $val){
                    $r = $this->chitietphieu->insert(null,null,$id,null,null,$val['soluong'],$val['taisan']);
                }
            }
            
            if($k && $r){
                Alert::alert()->success('Sửa phiếu kiểm kê thành công!!!')->autoClose(5000);
                return redirect()->route('kiemke.index');
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
        $this->chitietphieu->delete_phieu('ma_kiemke',$id);
        $kq=$this->kiemke->delete_kiemke($id);
        if($kq){
            return true;
        }else{
            return false;
        }
    }
    public function export($id) 
    {  
        $kk = $this->kiemke->find($id);
        $taisan = $this->taisan->export_tsOfphong($kk->ma_phong);
        $kiemke = $this->kiemke->nv_kiemke($id);
        $chitiet = $this->chitietphieu->select_kiemke($id);
        return Excel::download(new KiemkeExport($taisan,$kiemke,$kk->ngay_kiemke,$chitiet), 'kiemke.xlsx');
    }
    public function export_ds($id){
        $taisan = $this->taisan->export_tsOfphong($id);
        return Excel::download(new DstaisankiemkeExport($taisan), 'dstaisan.xlsx');
    }

    public function search_kiemke(Request $request){
        if($request->ajax()){
            $text=$request->text;
            $seleted =$request->seleted;
            if($text !='' || $seleted !=''){
                $kiemke = $this->kiemke->search($text,$seleted);
            }else{
                $kiemke = $this->kiemke->select();
            }
            return view('kiemke.list_kiemke',compact('kiemke'));
        }
    }

    public function tinh_haomon(Request $request){
        if($request->ajax()){
            $ngaykk = Carbon::parse($request->ngaykk)->year;
            $taisan = $this->taisan->export_tsOfphong($request->phong);
            foreach($taisan as $val){
                $ngaymua = Carbon::parse($val->ngay_mua)->year;
                $nam = $ngaykk-$ngaymua;
                if( $nam <= $val->thoi_gian_sd){
                    $val->giatri = ($val->muc_tieuhao/100)*$val->nguyengia*($val->thoi_gian_sd-$nam);
                }
            }
            return view('kiemke.list_taisan',compact('taisan'));
        }
    }
}
