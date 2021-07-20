<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class Tieuhao extends Model
{
    public $table = "tieuhaotaisan";
    public function select()
    {   
        $th = DB::table($this->table)->paginate(8);
        return $th;
    }
   
    public function max_id($col,$str){
        $kq = DB::table($this->table)->selectRaw("max($col) as ma_tieuhao")
                                    ->where("ma_tieuhao","like",'%' . $str . '%')
                                    ->first();
        return $kq;
    }
    public function find_by_ts($ma_ts){
        $data = DB::table($this->table)->where('ma_loai','=',''.$ma_ts.'')->first();
        return $data;
    }
    public function updateth($ma_tieuhao,$tile_HM_up,$tgSD_up){
        $data =DB::table($this->table)->where('ma_tieuhao',$ma_tieuhao)
            ->update([
                'muc_tieuhao'=>$tile_HM_up,
                'thoi_gian_sd' =>$tgSD_up
            ]);
        return $data;
    }
    public function insert($ma_tieuhao,$tile_HM_up,$tgSD_up,$ma_loai){
        $data =DB::table($this->table)
            ->insert([
                'ma_tieuhao'=>$ma_tieuhao,
                'muc_tieuhao'=>$tile_HM_up,
                'thoi_gian_sd' =>$tgSD_up,
                'ma_loai'=>$ma_loai
            ]);
        return $data;
    }
    public function delete_th($ma_loai)
    {
        return DB::table($this->table)->where('ma_loai',$ma_loai)->delete();
    }
    
}
