<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class Hopdong extends Model
{   
    public function select()
    {
        $table = DB::table('hopdong')
        ->select('nhacungcap.ten_ncc','hopdong.*')
        ->join('nhacungcap','hopdong.ma_ncc','=','nhacungcap.ma_ncc')
        ->paginate(8);
        return $table;
    }
    public function search_hopdong( $text,$selected){
        $kq = DB::table('hopdong')
        ->select('nhacungcap.ten_ncc','hopdong.*')
        ->join('nhacungcap','hopdong.ma_ncc','=','nhacungcap.ma_ncc');
        if($text !=''){
            $kq = $kq->where('hopdong.ma_hopdong','like','%'.$text.'%',);
        }
        if($selected !=''){
            $kq = $kq->where('hopdong.ma_ncc',$selected);
        }
        $kq =$kq->distinct()->paginate(8);
        return $kq;
    }
    public function show_chitiethd ($id)
    {
        $kq = DB::table('hopdong')
        ->select('hopdong.*','nhacungcap.ten_ncc','chitiethopdong.*')
        ->join('nhacungcap','hopdong.ma_ncc','=','nhacungcap.ma_ncc')
        ->join('chitiethopdong','hopdong.ma_hopdong','=','chitiethopdong.ma_hopdong')
        ->where('hopdong.ma_hopdong',$id)
        ->first();
        return $kq;
    }
    public function show_cttaisan($id)
    {
        $kq = DB::table('chitiethopdong')
        ->select('chitiethopdong.*','taisan.ten_ts','taisan.nguyengia')
        ->join('taisan','taisan.ma_ts','=','chitiethopdong.ma_ts')
        ->where('chitiethopdong.ma_hopdong',$id)
        ->paginate(8);
        return $kq;
    }
}
// taisan.ten_ts','taisan.nguyengia'