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
        $taisan = DB::table($this->table)->select('taisan.*','loaitaisan.ten_loai')->join('loaitaisan','taisan.ma_loai','=','loaitaisan.ma_loai')->paginate(8);
        return $taisan;
    }

    public function max_id($col,$str){
        $kq = DB::table($this->table)->selectRaw("max($col) as ma_ts")
                                    ->where("ma_ts","like",'%' . $str . '%')
                                    ->first();
        return $kq;
    }

    public function insert($ma_ts,$ten_ts,$ma_loai,$mota){
        $table=DB::table($this->table)->insert([
            'ma_ts' =>$ma_ts,
            'ten_ts' =>$ten_ts,
            'ma_loai' =>$ma_loai,
            'mota' =>$mota
            
        ]);
        return $table;
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
