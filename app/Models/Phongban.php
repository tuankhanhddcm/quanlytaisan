<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Phongban extends Model
{
    protected $table = 'phongban';

    public function select($all =''){

        $data = DB::table($this->table);
        if($all !=''){
            $data = $data->get();
        }else{
            $data = $data->paginate(8);
        }
        return $data;
    }

    public function max_id($col,$str){
        $kq = DB::table($this->table)->selectRaw("max($col) as ma_phong")
                                    ->where("ma_phong","like",'%' . $str . '%')
                                    ->first();
        return $kq;
    }

    public function insert($ma_phong,$ten_phong,$mo_ta,$created){
        $data = DB::table($this->table)->insert(
            [
                'ma_phong'=>$ma_phong,
                'ten_phong'=>$ten_phong,
                'mota' =>$mo_ta,
                'created' =>$created
            ]
            );
        return $data;
    }
}
