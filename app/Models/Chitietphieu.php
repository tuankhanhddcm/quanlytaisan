<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Chitietphieu extends Model
{
    protected $table ='chitietphieu';
    public function select($all=''){
        $loaits = DB::table($this->table);
        if($all !=''){
            $loaits = $loaits->get();
        }else{
            $loaits = $loaits->paginate(8);
        }
        return $loaits;
    }
    
    public function find($id){
        $data = DB::table($this->table)
        ->select('loaitaisancodinh.*','loai.ten_loai as loai','tieuhaotaisan.*')
        ->join('tieuhaotaisan','loaitaisancodinh.ma_loai','=','tieuhaotaisan.ma_loai')
        ->join('loai','loaitaisancodinh.id_loai','=','loai.id_loai')
        ->where('loaitaisancodinh.ma_loai','=',''.$id.'')->first();
        return $data;
    }
    
    public function insert($ma_bangiao,$ma_thanhly,$ma_kiemke,$ma_chitiet,$tinhtrang){
        $table=DB::table($this->table)->insert([
            'ma_bangiao'=>$ma_bangiao,
            'ma_thanhly'=>$ma_thanhly,
            'ma_kiemke'=>$ma_kiemke,
            'ma_chitiet'=>$ma_chitiet,
            'tinhtrang'=>$tinhtrang,
        ]);
        return $table;
    }

    public function update_tinhtrang_bangiao($ma_chitiet,$ma_bangiao,$tinhtrang){
        $kq = DB::table($this->table)->where('ma_chitiet','=',''.$ma_chitiet.'')->where('ma_bangiao','=',''.$ma_bangiao.'')->update([
            'tinhtrang'=>$tinhtrang,
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
