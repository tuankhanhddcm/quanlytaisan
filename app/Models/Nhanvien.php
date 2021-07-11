<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Nhanvien extends Model
{
    public $table ="nhanvien";
    
    public function select($all='',$dieukien =''){
        $nv = DB::table($this->table)
        ->select('nhanvien.*','phongban.ten_phong','chucvu.ten_chucvu')
        ->join('phongban','nhanvien.ma_phong','=','phongban.ma_phong')
        ->join('chucvu','nhanvien.ma_chucvu','=','chucvu.ma_chucvu');
        if($dieukien !=''){
            $nv = $nv->where('phongban.ma_phong',$dieukien);
        }
        if($all !=''){
            $nv = $nv->get();
        }else{
            $nv = $nv->paginate(8);
        }
        return $nv;
    }

    public function max_id($col,$str){
        $kq = DB::table($this->table)->selectRaw("max($col) as ma_nv")
                                    ->where("ma_nv","like",'%' . $str . '%')
                                    ->first();
        return $kq;
    }

    public function insert($ma_nv,$ten_nv,$sdt,$email,$diachi,$created,$ma_phong,$ma_chucvu){
        $table=DB::table($this->table)->insert([
            'ma_nv' =>$ma_nv,
            'ten_nv' =>$ten_nv,
            'sdt'=>$sdt,
            'email' =>$email,
            'diachi' =>$diachi,
            'created' =>$created,
            'ma_phong' =>$ma_phong,
            'ma_chucvu'=>$ma_chucvu
            
        ]);
        return $table;
    }

    public function nvOfphong($ma_phong){
        $data = DB::table($this->table)->where('ma_phong','=',''.$ma_phong.'')->get();
        return $data;
    }
    public function nvOftaisan($ma_ts){
        $data = DB::table($this->table)
        ->select('nhanvien.ma_nv','nhanvien.ten_nv')
        ->join('phongban','phongban.ma_phong','=','nhanvien.ma_phong')
        ->join('chitiettaisan','chitiettaisan.ma_phong','=','phongban.ma_phong')
        ->groupBy('nhanvien.ma_nv','nhanvien.ten_nv')
        ->where('chitiettaisan.ma_ts',$ma_ts)->get();
        return $data;
    }

    public function find($id)
    {
        $kq = DB::table($this->table)->where('nhanvien.ma_nv',$id)
        ->join('phongban','nhanvien.ma_phong','=','phongban.ma_phong')
        ->join('chucvu','nhanvien.ma_chucvu','=','chucvu.ma_chucvu')->first();
        return $kq;
    }

    public function update_nv($id,$ten_nv,$sdt,$email,$diachi,$ma_phong,$date,$chuc_vu)
    {
        $table = DB::table($this->table)->where('nhanvien.ma_nv',$id)->update([
            'ten_nv'=>$ten_nv,
            'sdt'=>$sdt,
            'email'=>$email,
            'diachi'=>$diachi,
            'ma_phong'=>$ma_phong,
            'created'=>$date,
            'ma_chucvu'=>$chuc_vu,
        ]);
        return $table;
    }
    public function search_nv($text,$selected)
    {
        $table = DB::table($this->table);
        if($selected !=''){
            $table = $table->where('nhanvien.ma_phong',$selected);
        }
        if($text !=''){
            $table = $table->where(function($res) use($text){
                $res->where('nhanvien.ma_nv','like','%'.$text.'%')
                    ->orwhere('nhanvien.ten_nv','like','%'.$text.'%');
            });
        }
        $table =$table->join('phongban','nhanvien.ma_phong','=','phongban.ma_phong')
        ->join('chucvu','nhanvien.ma_chucvu','=','chucvu.ma_chucvu')
        ->select('nhanvien.*','phongban.ten_phong','chucvu.ten_chucvu')
        ->paginate(8);
        return $table;
    }
}
