<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class LoaiTSCD extends Model
{
    protected $table ='loaitaisancodinh';
    protected $fillable = [
        'ma_loai',
        'ten_loai',
    ];
    

    public function select(){
        $loaits = DB::table($this->table)
        ->select('loaitaisancodinh.*','loai.ten_loai as loai')
        ->join('loai','loaitaisancodinh.id_loai','=','loai.id_loai')
        ->paginate(8);
        return $loaits;
    }

    public function max_id($col,$str){
        $kq = DB::table($this->table)->selectRaw("max($col) as ma_loai")
                                    ->where("ma_loai","like",'%' . $str . '%')
                                    ->first();
        return $kq;
    }
    
    public function insert($ma_loai,$ten_loai,$loai){
        $table=DB::table($this->table)->insert([
            'ma_loai'=>$ma_loai,
            'ten_loai' =>$ten_loai,
            'id_loai' =>$loai
        ]);
        return $table;
    }

    public function search($text){
        $loai = DB::table($this->table);
        if($text !=''){
            $loai = $loai->where('ten_loai','like','%'.$text.'%');
                
        }
        $loai = $loai->paginate(8);
        return $loai;
    }
}
