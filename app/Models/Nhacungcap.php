<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Nhacungcap extends Model
{
    public $table ="nhacungcap";
    
    public function select(){
        $taisan = DB::table($this->table)->paginate(8);
        return $taisan;
    }

    public function max_id($col,$str){
        $kq = DB::table($this->table)->selectRaw("max($col) as ma_ncc")
                                    ->where("ma_ncc","like",'%' . $str . '%')
                                    ->first();
        return $kq;
    }

    public function insert($ma_ncc,$ten_ncc,$sdt,$email,$diachi,$created){
        $table=DB::table($this->table)->insert([
            'ma_ncc' =>$ma_ncc,
            'ten_ncc' =>$ten_ncc,
            'sdt'=>$sdt,
            'email' =>$email,
            'diachi' =>$diachi,
            'created' =>$created
            
        ]);
        return $table;
    }

    public function find($id){
        $data = DB::table($this->table)
        ->where('nhacungcap.ma_ncc','=',''.$id.'')->first();
        return $data;
    }

    public function update_ncc($id,$ten_ncc,$sdt,$email,$diachi){
        $kq = DB::table($this->table)->where('ma_ncc','=',''.$id.'')->update([
            'ten_ncc'=>$ten_ncc,
            'sdt'=>$sdt,
            'email'=>$email,
            'diachi'=>$diachi
        ]);
        return $kq;
    }
    public function search_ncc($text)
    {
        $table = DB::table($this->table)->where(function($res) use($text){
            $res->where('nhacungcap.ten_ncc','like','%'.$text.'%')
                ->orwhere('nhacungcap.ma_ncc','like','%'.$text.'%');
        });
        $table = $table->paginate(8);
        return $table;
    }
}
