<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Chitiettaisan extends Model
{
    protected $table = 'chitiettaisan';

    public function select(){
        // $data = DB::table($this->table)->select('chitiettaisan.*','nhacungcap.ten_ncc','phongban.ten_phong','tieuhaotaisan.muc_tieuhao','taisan.ten_ts')
        //     ->join('taisan','chitiettaisan.ma_ts','=','taisan.ma_ts')
        //     ->join('nhacungcap','chitiettaisan.ma_ncc','=','nhacungcap.ma_ncc')
        //     ->join('phongban','chitiettaisan.ma_phong','=','phongban.ma_phong')
        //     ->join('tieuhaotaisan','chitiettaisan.ma_tieuhao','=','tieuhaotaisan.ma_tieuhao')
        //     ->paginate(8);
        $data = DB::table($this->table)->paginate(8);
        return $data;
    }

    public function max_id($col,$str){
        $kq = DB::table($this->table)->selectRaw("max($col) as ma_chitiet")
                                    ->where("ma_chitiet","like",'%' . $str . '%')
                                    ->first();
        return $kq;
    }

    public function insert($ma_chitet,$ma_ts,$ten_chitiet){
        $kq = DB::table($this->table)->insert([
            'ma_chitiet'=>$ma_chitet,
            'ma_ts'=>$ma_ts,
            'ten_chitiet' =>$ten_chitiet
        ]);
        return $kq;
    }
}
