<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class Taisan extends Model
{
    // protected $fillable =[
    //     'ma_ts',
    //     'ten_ts',
    //     'soluong',
    //     'ma_loai',
    // ];
    public $table ="taisan";
    
    public function select(){
        $data = DB::table($this->table)
            ->select('taisan.*','nhacungcap.ten_ncc','phongban.ten_phong','loaitaisancodinh.ten_loai')
            ->join('loaitaisancodinh','taisan.ma_loai','=','loaitaisancodinh.ma_loai')
            ->join('nhacungcap','taisan.ma_ncc','=','nhacungcap.ma_ncc')
            ->join('phongban','taisan.ma_phong','=','phongban.ma_phong')
            ->paginate(8);
        return $data;
    }

    public function max_id($col,$str){
        $kq = DB::table($this->table)->selectRaw("max($col) as ma_ts")
                                    ->where("ma_ts","like",'%' . $str . '%')
                                    ->first();
        return $kq;
    }

    public function insert($ma_ts,$ten_ts,$ma_loai,$nguyen_gia,$ma_ncc,$ngay_mua,$nam_sx,$nuoc_sx,$ngay_sd,$ngay_ghitang,$ma_phong){
        $kq = DB::table($this->table)->insert([
            'ma_ts'=>$ma_ts,
            'ten_ts' =>$ten_ts,
            'nguyengia'=>$nguyen_gia,
            'ma_ncc'=> $ma_ncc,
            'ngay_mua' =>$ngay_mua,
            'ma_phong'=>$ma_phong,
            'nam_sx'=>$nam_sx,
            'nuoc_sx'=>$nuoc_sx,
            'ma_phong'=>$ma_phong,
            'ma_loai' =>$ma_loai,
            'ngay_sd' =>$ngay_sd,
            'ngay_ghi_tang' =>$ngay_ghitang,
        ]);
        return $kq;
    }

    public function search_taisan( $text,$selected){
        $kq = DB::table($this->table)->select('taisan.*','loaitaisan.ten_loai')->join('loaitaisan','taisan.ma_loai','=','loaitaisan.ma_loai');
        if($text !=''){
            $kq = $kq->where(function($res) use($text){
                    $res->where('taisan.ten_ts','like','%'.$text.'%')
                        ->orwhere('taisan.ma_ts','like','%'.$text.'%');
            });
        }
        if($selected !=''){
            $kq = $kq->where('loaitaisan.ma_loai',$selected);
        }
        $kq =$kq->paginate(8);
        return $kq;
    }

    public function show_ts($ma_ts){
        $table = DB::table($this->table)->where('ma_ts','=',$ma_ts)->first();
        return $table;
    }
}
