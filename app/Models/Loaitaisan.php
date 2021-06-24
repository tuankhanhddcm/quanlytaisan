<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Loaitaisan extends Model
{
    protected $table ='loaitaisan';
    protected $fillable = [
        'ma_loai',
        'ten_loai',
        'mo_ta',
        'created'
    ];
    

    public function select(){
        $loaits = DB::table($this->table)->paginate(8);
        return $loaits;
    }

    public function max_id($col,$str){
        $kq = DB::table($this->table)->selectRaw("max($col) as ma_loai")
                                    ->where("ma_loai","like",'%' . $str . '%')
                                    ->first();
        return $kq;
    }

    public function insert($ma_loai,$ten_loai,$mo_ta,$date){
        $table=DB::table($this->table)->insert([
            'ma_loai' =>$ma_loai,
            'ten_loai' =>$ten_loai,
            'mo_ta' =>$mo_ta,
            'created' =>$date,
            
        ]);
        return $table;
    }

    public function search($text){
        $loai = DB::table($this->table);
        if($text !=''){
            $loai = $loai->where(function($res) use($text){
                    $res->where('ten_loai','like','%'.$text.'%')
                        ->orwhere('ma_loai','like','%'.$text.'%');
            });
        }
        $loai = $loai->paginate(8);
        return $loai;
    }
}
