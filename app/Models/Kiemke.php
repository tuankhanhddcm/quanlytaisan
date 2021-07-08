<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Kiemke extends Model
{
    protected $table ='phieukiemke';
   

    public function select($all=''){
        $loaits = DB::table($this->table)->join('phongban','phongban.ma_phong','=','phieukiemke.ma_phong')
                                        ->select('phieukiemke.*','phongban.ten_phong');
        if($all !=''){
            $loaits = $loaits->get();
        }else{
            $loaits = $loaits->paginate(8);
        }
        return $loaits;
    }

    public function max_id($col,$str){
        $kq = DB::table($this->table)->selectRaw("max($col) as ma_kiemke")

                                    ->where("ma_kiemke","like",'%' . $str . '%')
                                    ->first();
        return $kq;
    }
    
    public function insert($ma_kiemke,$dot_kiemke,$ngay_kiemke,$ma_phong,$ghichu){
        $table=DB::table($this->table)->insert([
            'ma_kiemke'=>$ma_kiemke,
            'dot_kiemke'=>$dot_kiemke,
            'ngay_kiemke' =>$ngay_kiemke,
            'ma_phong'=>$ma_phong,
            'ghichu'=>$ghichu
            
        ]);
        return $table;
    }

    public function insert_bankiemke($ma_kiemke,$ma_nv){
        $table=DB::table('bankiemke')->insert([
            'ma_kiemke'=>$ma_kiemke,
            'ma_nv' =>$ma_nv
            
        ]);
        return $table;
    }

    public function update_bangiao($ma_bangiao,$nguoi_giao,$nguoi_nhan,$ghichu,$phieu,$ngay_nhan){
        $data=DB::table($this->table)
            ->where('ma_bangiao',$ma_bangiao)
            ->update([
                'nguoi_giao' =>$nguoi_giao,
                'nguoi_nhan' =>$nguoi_nhan,
                'ghichu' =>$ghichu,
                'phieu'=>$phieu,
                'ngay_nhan' =>$ngay_nhan,
            ]);
        return $data;
    }

    public function find($ma_kiemke){
        $data = DB::table($this->table)->where('ma_kiemke',$ma_kiemke)->first();
        return $data;
    }
    public function nv_kiemke($ma_kiemke){
        $data = DB::table('bankiemke')
            ->join('nhanvien','nhanvien.ma_nv','=','bankiemke.ma_nv')
            ->join('chucvu','chucvu.ma_chucvu','=','nhanvien.ma_chucvu')
            ->where('bankiemke.ma_kiemke',$ma_kiemke)
            ->select('nhanvien.ten_nv','chucvu.ten_chucvu')
            ->get();
        return $data;
    }
}
