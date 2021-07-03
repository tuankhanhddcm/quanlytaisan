<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Chitiettaisan extends Model
{
    protected $table = 'chitiettaisan';

    public function table_join(){
        $data = DB::table($this->table)
                ->select('chitiettaisan.*','taisan.ten_ts','taisan.ma_phong')
                ->join('taisan','chitiettaisan.ma_ts','=','taisan.ma_ts');
        return $data;
    }

    public function select($dieukien=''){
        $data = $this->table_join();
        if($dieukien !=''){
            $data = $data->where('chitiettaisan.ma_ts','=',''.$dieukien.'');
        }
        $data = $data->paginate(8);
        return $data;
    }

    public function max_id($col,$str){
        $kq = DB::table($this->table)->selectRaw("max($col) as ma_chitiet")
                                    ->where("ma_chitiet","like",'%' . $str . '%')
                                    ->first();
        return $kq;
    }

    public function insert($ma_chitet,$ma_ts,$ten_chitiet,$so_serial='',$trangthai='',$ma_nv=null){
        $kq = DB::table($this->table)->insert([
            'ma_chitiet'=>$ma_chitet,
            'ma_ts'=>$ma_ts,
            'ten_chitiet' =>$ten_chitiet,
            'so_serial' =>$so_serial,
            'trangthai'=>$trangthai,
            'ma_nv'=>$ma_nv
        ]);
        return $kq;
    }
    public function search_chitiet( $text,$selected){
        $kq = $this->table_join();
        if($text !=''){
            $kq = $kq->where(function($res) use($text){
                    $res->where('chitiettaisan.ten_chitiet','like','%'.$text.'%')
                        ->orwhere('chitiettaisan.ma_chitiet','like','%'.$text.'%');
            });
        }
        if($selected !=''){
            $kq = $kq->where('taisan.ma_ts',$selected);
        }
        $kq =$kq->paginate(8);
        return $kq;
    }

    public function delete_chitiet($ma_chitet)
    {
        $kq =DB::table($this->table)->where('ma_chitiet','=',''.$ma_chitet.'')->delete();
    }

    public function show_id($id){
        $data = $this->table_join()->where('ma_chitiet','=',''.$id.'')->first();
        return $data;
    }

    public function update_chitiet($ma_chitet,$ma_ts,$ten_chitiet,$so_serial='',$trangthai='',$ma_nv=null){
        $kq = DB::table($this->table)
            ->where('ma_chitiet','=',''.$ma_chitet.'')
            ->update([
                'ma_ts'=>$ma_ts,
                'ten_chitiet' =>$ten_chitiet,
                'so_serial' =>$so_serial,
                'trangthai'=>$trangthai,
                'ma_nv'=>$ma_nv
            ]);
        return $kq;
    }
    public function ctOfphong($ma_ts){
        $data = DB::table($this->table)->where('ma_ts','=',''.$ma_ts.'')->get();
        return $data;
    }
}
