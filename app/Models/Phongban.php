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

    public function find($id)
    {
        $table = DB::table($this->table)->where('phongban.ma_phong','=',$id)->first();
        return $table;
    }
    public function update_phong($id, $ten_phong, $mota)
    {   
        $table = DB::table($this->table)->where('phongban.ma_phong',$id)->update([
            'ten_phong'=>$ten_phong,
            'mota'=>$mota,
        ]);
    }
    public function search_phongban($text)
    {
            $kq = DB::table($this->table)->where(function($res) use($text){
                $res->where('phongban.ten_phong','like','%'.$text.'%')
                    ->orwhere('phongban.ma_phong','like','%'.$text.'%');
            });
        $kq =$kq->paginate(8);
        return $kq;
    }

    public function phongOfts($ma_ts){
        $data = DB::table($this->table)
        ->select('phongban.ma_phong','phongban.ten_phong')
        ->join('chitiettaisan','chitiettaisan.ma_phong','=','phongban.ma_phong')
        ->groupBy('phongban.ma_phong','phongban.ten_phong')
        ->where('chitiettaisan.ma_ts',$ma_ts)->get();
        return $data;
    }

}
