<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Bangiao extends Model
{
    protected $table ='phieubangiao';
    public function select($all=''){
        $loaits = DB::table($this->table);
        if($all !=''){
            $loaits = $loaits->get();
        }else{
            $loaits = $loaits->paginate(8);
        }
        return $loaits;
    }

    public function max_id($col,$str){
        $kq = DB::table($this->table)->selectRaw("max($col) as ma_bangiao")

                                    ->where("ma_bangiao","like",'%' . $str . '%')
                                    ->first();
        return $kq;
    }

    public function find($id){
        $data = DB::table($this->table)
        ->select('loaitaisancodinh.*','loai.ten_loai as loai','tieuhaotaisan.*')
        ->join('tieuhaotaisan','loaitaisancodinh.ma_loai','=','tieuhaotaisan.ma_loai')
        ->join('loai','loaitaisancodinh.id_loai','=','loai.id_loai')
        ->where('loaitaisancodinh.ma_loai','=',''.$id.'')->first();
        return $data;
    }
    
    public function insert($ma_bangiao,$nguoi_giao,$nguoi_nhan,$ghichu,$phieu,$ngay_nhan){
        $table=DB::table($this->table)->insert([
            'ma_bangiao'=>$ma_bangiao,
            'nguoi_giao' =>$nguoi_giao,
            'nguoi_nhan' =>$nguoi_nhan,
            'ghichu' =>$ghichu,
            'phieu'=>$phieu,
            'ngay_nhan' =>$ngay_nhan,
        ]);
        return $table;
    }

    public function update_loai($id,$ten_loai,$id_loai){
        $kq = DB::table($this->table)->where('ma_loai','=',''.$id.'')->update([
            'ten_loai'=>$ten_loai,
            'id_loai'=>$id_loai,
        ]);
        return $kq;
    }

    public function search($text,$selected){
        $loai = DB::table($this->table)
        ->select('loaitaisancodinh.*','loai.ten_loai as loai')
        ->join('loai','loaitaisancodinh.id_loai','=','loai.id_loai');
        if($text !=''){
            $loai = $loai->where('loaitaisancodinh.ten_loai','like','%'.$text.'%');
                
        }
        if($selected !=''){
            $loai = $loai->where('loaitaisancodinh.id_loai',$selected);
        }
        $loai = $loai->paginate(8);
        return $loai;
    }
}
