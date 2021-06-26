<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class Tieuhao extends Model
{
    public $tieuhao = "tieuhaotaisan";
    public function select()
    {   
        $th = DB::table($this->tieuhao)->paginate(8);
        return $th;
    }
    public function max_id($col,$str){
        $kq = DB::table($this->tieuhao)->selectRaw("max($col) as ma_tieuhao")
                                    ->where("ma_tieuhao","like",'%' . $str . '%')
                                    ->first();
        return $kq;
    }

    public function insert($ma_tieuhao,$muc_tieuhao,$thoigian_sd,$ma_loai,$ngay_bd){
        $tieuhao=DB::table($this->tieuhao)->insert([
            'ma_tieuhao' =>$ma_tieuhao,
            'muc_tieuhao' =>$muc_tieuhao,
            'thoi_gian_sd' =>$thoigian_sd,
            'ngay_bat_dau' =>$ngay_bd,
            'ma_loai' =>$ma_loai
        ]);
        return $tieuhao;
    }
    public function updateth($ma_tieuhao, $muc_tieuhao, $thoigian_sd)
    {
    
       
        $tieuhao = DB::table($this->tieuhao)->where('ma_tieuhao','=',$ma_tieuhao)->update([
            'muc_tieuhao'=>$muc_tieuhao,
            'thoi_gian_sd'=>$thoigian_sd
        ]);
        return $tieuhao;
    }
}
