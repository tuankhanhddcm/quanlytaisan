<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class Thanhly extends Model
{
    protected $table = 'phieuthanhly';

    public function select($all ='')
    {
        $table = DB::table('phieuthanhly')
        ->join('nhanvien','phieuthanhly.ma_nv','=','nhanvien.ma_nv')
        ->join('phongban','phieuthanhly.ma_phong','=','phongban.ma_phong');
        if($all !=''){
            $table = $table->get();
        }else{
            $table = $table->paginate(8);
        }
        return $table;
    }
    public function max_id($col,$str){
        $kq = DB::table($this->table)->selectRaw("max($col) as ma_thanhly")
                                    ->where("ma_thanhly","like",'%' . $str . '%')
                                    ->first();
        return $kq;
    }
    public function find($id)
    {
        $table = DB::table('phieuthanhly')
        ->join('nhanvien','phieuthanhly.ma_nv','=','nhanvien.ma_nv')
        ->join('phongban','phieuthanhly.ma_phong','=','phongban.ma_phong')
        ->where('ma_thanhly',$id)
        ->first();
        return $table;
    }
    public function chitietthanhly($id)
    {
        $table = DB::table('taisan')
        ->join('loaitaisancodinh','taisan.ma_loai','=','loaitaisancodinh.ma_loai')
        ->join('nhacungcap','taisan.ma_ncc','=','nhacungcap.ma_ncc')
        ->join('tieuhaotaisan','tieuhaotaisan.ma_loai','=','taisan.ma_loai')
        ->join('chitiettaisan','taisan.ma_ts','=','chitiettaisan.ma_ts')
        ->join('chitietphieu','chitiettaisan.ma_chitiet','=','chitietphieu.ma_chitiet')
        ->where('chitietphieu.ma_thanhly',$id)
        ->paginate(8);
        return $table;
    }
    public function insert($ma_thanhly,$ma_nv,$ma_phong,$ghichu,$phieu,$ngay_thanhly){
        $table=DB::table($this->table)->insert([
            'ma_thanhly'=>$ma_thanhly,
            'ma_nv' =>$ma_nv,
            'ma_phong' =>$ma_phong,
            'ghichu' =>$ghichu,
            'phieu'=>$phieu,
            'ngay_thanhly' =>$ngay_thanhly,
        ]);
        return $table;
    }
    public function updat_thanhly($ma_thanhly,$ma_nv,$ma_phong,$ghichu,$phieu,$ngay_thanhly){
        $table=DB::table($this->table)->where('ma_thanhly',$ma_thanhly)->update([
            'ma_nv' =>$ma_nv,
            'ma_phong' =>$ma_phong,
            'ghichu' =>$ghichu,
            'phieu'=>$phieu,
            'ngay_thanhly' =>$ngay_thanhly,
        ]);
        return $table;
    }

    public function search($text,$ma_phong,$ma_nv){

        $table = DB::table('phieuthanhly')
        ->join('nhanvien','phieuthanhly.ma_nv','=','nhanvien.ma_nv')
        ->join('phongban','phieuthanhly.ma_phong','=','phongban.ma_phong');
        if($text !=''){
            $table = $table->where('phieuthanhly.ma_thanhly','like','%'.$text.'%');
                
        }
        if($ma_phong !=''){
            $table = $table->where('phongban.ma_phong',$ma_phong);
        }
        if($ma_nv !=''){
            $table = $table->where('nhanvien.ma_nv',$ma_nv);
        }
        $table = $table->paginate(8);
        return $table;
    }

    public function delete_thanhly($ma_thanhly)
    {
        $kq = DB::table($this->table)->where('ma_thanhly',$ma_thanhly)->delete();
        return $kq;
    }
}
