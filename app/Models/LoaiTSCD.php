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
        ->join('tieuhaotaisan','loaitaisancodinh.ma_loai','=','tieuhaotaisan.ma_loai')
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

    public function find($id){
        $data = DB::table($this->table)
        ->select('loaitaisancodinh.*','loai.ten_loai as loai','tieuhaotaisan.*')
        ->join('tieuhaotaisan','loaitaisancodinh.ma_loai','=','tieuhaotaisan.ma_loai')
        ->join('loai','loaitaisancodinh.id_loai','=','loai.id_loai')
        ->where('loaitaisancodinh.ma_loai','=',''.$id.'')->first();
        return $data;
    }
    
    public function insert($ma_loai,$ten_loai,$loai){
        $table=DB::table($this->table)->insert([
            'ma_loai'=>$ma_loai,
            'ten_loai' =>$ten_loai,
            'id_loai' =>$loai
        ]);
        return $table;
    }

    public function update_loai($id,$ten_loai,$id_loai){
        $kq = DB::table($this->table)->where('ma_loai','=',''.$id.'')->update([
            'ten_loai'=>$ten_loai,
            'id_loai'=>$id_loai,
        ]);
        return $kq;
    }

    public function search($text,$selected){
        $loai = DB::table($this->table)
        ->select('loaitaisancodinh.*','loai.ten_loai as loai')
        ->join('loai','loaitaisancodinh.id_loai','=','loai.id_loai');
        if($text !=''){
            $loai = $loai->where('loaitaisancodinh.ten_loai','like','%'.$text.'%');
                
        }
        if($selected !=''){
            $loai = $loai->where('loaitaisancodinh.id_loai',$selected);
        }
        $loai = $loai->paginate(8);
        return $loai;
    }
}
