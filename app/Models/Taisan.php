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
    
    
    public function table_join(){
        // $temp_sl = DB::table($this->table)
        //         ->select('taisan.ma_ts',DB::raw('count(chitiettaisan.ma_ts) as soluong'))
        //         ->join('chitiettaisan','taisan.ma_ts','=','chitiettaisan.ma_ts')
        //         ->groupBy('taisan.ma_ts');
        $data = DB::table($this->table)
            ->select('taisan.*','nhacungcap.ten_ncc','loaitaisancodinh.ten_loai','tieuhaotaisan.muc_tieuhao','tieuhaotaisan.thoi_gian_sd')
            ->join('loaitaisancodinh','taisan.ma_loai','=','loaitaisancodinh.ma_loai')
            ->join('nhacungcap','taisan.ma_ncc','=','nhacungcap.ma_ncc')
            ->join('tieuhaotaisan','tieuhaotaisan.ma_loai','=','taisan.ma_loai');
            // ->joinSub($temp_sl,'temp_sl',function($join){
            //     $join->on('taisan.ma_ts','=','temp_sl.ma_ts');
            // });
        return $data;
    }
    public function sl_taisan(  ){
        $temp_sl = DB::table($this->table)
                ->select('taisan.ma_ts',DB::raw('count(chitiettaisan.ma_ts) as soluong'))
                ->join('chitiettaisan','taisan.ma_ts','=','chitiettaisan.ma_ts')->groupBy('taisan.ma_ts')->get();
        return $temp_sl;
    }

    public function select($dieukien='',$all=''){
     
        $temp =$this->sl_taisan();
        
        $data =$this->table_join()->where('taisan.deleted',0);
        if($dieukien !=''){
            $data =$data->where('taisan.ma_loai','=',''.$dieukien.'');
        }
        if($all !=''){
            $data = $data->get();
        }else{
            $data= $data->paginate(8);
        } 
        foreach($data as $val){
            $val->soluong = 0;
            foreach($temp as $v){
                if($val->ma_ts == $v->ma_ts){
                    $val->soluong=$v->soluong;
                }
            }
        }
        return $data;
    }

    public function max_id($col,$str){
        $kq = DB::table($this->table)->selectRaw("max($col) as ma_ts")
                                    ->where("ma_ts","like",'%' . $str . '%')
                                    ->first();
        return $kq;
    }

    public function insert($ma_ts,$ten_ts,$ma_loai,$nguyen_gia,$ma_ncc,$ngay_mua,$nam_sx,$nuoc_sx,$ngay_sd,$ngay_ghitang){
        $kq = DB::table($this->table)->insert([
            'ma_ts'=>$ma_ts,
            'ten_ts' =>$ten_ts,
            'nguyengia'=>$nguyen_gia,
            'ma_ncc'=> $ma_ncc,
            'ngay_mua' =>$ngay_mua,
            'nam_sx'=>$nam_sx,
            'nuoc_sx'=>$nuoc_sx,
            'ma_loai' =>$ma_loai,
            'ngay_sd' =>$ngay_sd,
            'ngay_ghi_tang' =>$ngay_ghitang,
        ]);
        return $kq;
    }

    public function search_taisan( $text,$selected,$ma_phong,$deleted){
        // $phong = $this->phong_taisan();
        $kq = $this->table_join()
        ->join('chitiettaisan','chitiettaisan.ma_ts','=','taisan.ma_ts')
        ->join('phongban','phongban.ma_phong','=','chitiettaisan.ma_phong')
        ->where('chitiettaisan.trangthai','!=',2)
        ->select('taisan.ma_ts','taisan.ten_ts','loaitaisancodinh.ten_loai','taisan.ngay_mua','taisan.deleted','taisan.nguyengia');
        if($text !=''){
            $kq = $kq->where(function($res) use($text){
                    $res->where('taisan.ten_ts','like','%'.$text.'%')
                        ->orwhere('taisan.ma_ts','like','%'.$text.'%');
            });
        }
        if($selected !=''){
            $kq = $kq->where('loaitaisancodinh.ma_loai',$selected);
        }
        
        if($deleted ==1){
            $kq = $kq->where('taisan.deleted',1);
        }else{
            $kq = $kq->where('taisan.deleted',0);
        }
        
        if($ma_phong !=''){
            // $mang =[];
            // foreach($kq as $val){
            //     $val->ten_phong = '';
            //     foreach($phong as $v){
            //         if($val->ma_ts == $v->ma_ts){
            //             $val->ten_phong = $v->ten_phong;
            //         }
            //     }
            // }

            // foreach($kq as $k=>$val){
            //     if($val->ten_phong ==$ma_phong){
            //         $mang[$k]=$val;
            //     }
            // }

            $kq = $kq->where('phongban.ma_phong',$ma_phong);
        }
        $kq =$kq->groupBy('taisan.ma_ts','taisan.ten_ts','loaitaisancodinh.ten_loai','taisan.ngay_mua','taisan.deleted','taisan.nguyengia')->orderBy('taisan.ma_ts')->paginate(8);
        $temp =$this->sl_taisan();
        // if($mang){
        //     foreach($mang as $val){
        //         $val->soluong = 0;
        //         foreach($temp as $v){
        //             if($val->ma_ts == $v->ma_ts){
        //                 $val->soluong=$v->soluong;
        //             }
        //         }
        //     }
        //     return $mang;
        // }else{
        //     foreach($kq as $val){
        //         $val->soluong = 0;
        //         foreach($temp as $v){
        //             if($val->ma_ts == $v->ma_ts){
        //                 $val->soluong=$v->soluong;
        //             }
        //         }
        //     }
        // }
        foreach($kq as $val){
            $val->soluong = 0;
            foreach($temp as $v){
                if($val->ma_ts == $v->ma_ts){
                    $val->soluong=$v->soluong;
                }
            }
        }
       
        return $kq;
    }

    public function show_ts($ma_ts){
        $temp =$this->sl_taisan();
        $table = $this->table_join()
            ->where('taisan.ma_ts','=',''.$ma_ts.'')
            ->orderBy('taisan.ma_ts')
            ->first();
        $table->soluong = 0;
        foreach($temp as $v){
            if($table->ma_ts == $v->ma_ts){
                $table->soluong=$v->soluong;
            }
        }
        return $table;
    }

    public function update_ts($ma_ts,$ten_ts,$ma_loai,$nguyen_gia,$ma_ncc,$ngay_mua,$nam_sx,$nuoc_sx,$ngay_sd,$ngay_ghitang){
        $kq = DB::table($this->table)
                ->where('ma_ts','=',''.$ma_ts.'')
                ->update([
                    'ten_ts' =>$ten_ts,
                    'nguyengia'=>$nguyen_gia,
                    'ma_ncc'=> $ma_ncc,
                    'ngay_mua' =>$ngay_mua,
                    'nam_sx'=>$nam_sx,
                    'nuoc_sx'=>$nuoc_sx,
                    'ma_loai' =>$ma_loai,
                    'ngay_sd' =>$ngay_sd,
                    'ngay_ghi_tang' =>$ngay_ghitang,
                ]);
        return $kq;
    }

    // public function tsOfphong($ma_phong){
    //     $data = $this->table_join()->where('taisan.ma_phong','=',''.$ma_phong.'')->get();
    //     return $data;
    // }
    
    

    public function phong_taisan(){
        $data =DB::table($this->table)
        ->join('chitiettaisan','taisan.ma_ts','=','chitiettaisan.ma_ts')
        ->join('phongban','phongban.ma_phong','=','chitiettaisan.ma_phong')
        ->select('taisan.ma_ts','phongban.ten_phong')
        ->distinct()
        ->get();
        return $data;
    }

    public function sl_taisan_phong($ma_phong){
        $temp_sl = DB::table($this->table)
        ->select('taisan.ma_ts',DB::raw('count(chitiettaisan.ma_ts) as soluong'))
        ->join('chitiettaisan','taisan.ma_ts','=','chitiettaisan.ma_ts')
        ->join('phongban','phongban.ma_phong','=','chitiettaisan.ma_phong')
        ->where('taisan.deleted',0)
        ->where('chitiettaisan.trangthai','!=',2)
        ->where('phongban.ma_phong',$ma_phong)
        ->groupBy('taisan.ma_ts');
        $data = DB::table($this->table)
            ->join('loaitaisancodinh','taisan.ma_loai','=','loaitaisancodinh.ma_loai')
            ->join('nhacungcap','taisan.ma_ncc','=','nhacungcap.ma_ncc')
            ->join('tieuhaotaisan','tieuhaotaisan.ma_loai','=','taisan.ma_loai')
            ->join('chitiettaisan','chitiettaisan.ma_ts','=','taisan.ma_ts')
            ->join('phongban','phongban.ma_phong','=','chitiettaisan.ma_phong')
            ->joinSub($temp_sl,'temp_sl',function($join){
                $join->on('taisan.ma_ts','=','temp_sl.ma_ts');
            })->where('phongban.ma_phong',$ma_phong)
            ->select('taisan.ma_ts','taisan.deleted','taisan.ten_ts','taisan.ngay_mua','soluong','nhacungcap.ten_ncc','loaitaisancodinh.ten_loai','tieuhaotaisan.muc_tieuhao','tieuhaotaisan.thoi_gian_sd','phongban.ten_phong')
            ->groupBy('taisan.ma_ts','taisan.deleted','taisan.ten_ts','taisan.ngay_mua','soluong','nhacungcap.ten_ncc','loaitaisancodinh.ten_loai','tieuhaotaisan.muc_tieuhao','tieuhaotaisan.thoi_gian_sd','phongban.ten_phong')
            ->paginate(8);
        return $data;
    }

    public function export_tsOfphong($ma_phong){
        $temp_sl = DB::table($this->table)
        ->select('taisan.ma_ts',DB::raw('count(chitiettaisan.ma_ts) as soluong'))
        ->join('chitiettaisan','taisan.ma_ts','=','chitiettaisan.ma_ts')
        ->join('phongban','phongban.ma_phong','=','chitiettaisan.ma_phong')
        ->where('taisan.deleted',0)
        ->where('chitiettaisan.trangthai','!=',2)
        ->where('phongban.ma_phong',$ma_phong)
        ->groupBy('taisan.ma_ts');
        $data = DB::table($this->table)
            ->join('loaitaisancodinh','taisan.ma_loai','=','loaitaisancodinh.ma_loai')
            ->join('nhacungcap','taisan.ma_ncc','=','nhacungcap.ma_ncc')
            ->join('tieuhaotaisan','tieuhaotaisan.ma_loai','=','taisan.ma_loai')
            ->join('chitiettaisan','chitiettaisan.ma_ts','=','taisan.ma_ts')
            ->join('phongban','phongban.ma_phong','=','chitiettaisan.ma_phong')
            ->joinSub($temp_sl,'temp_sl',function($join){
                $join->on('taisan.ma_ts','=','temp_sl.ma_ts');
            })->where('phongban.ma_phong',$ma_phong)
            ->where('taisan.deleted',0)
            ->select('taisan.*','soluong','nhacungcap.ten_ncc','loaitaisancodinh.ten_loai','tieuhaotaisan.muc_tieuhao','tieuhaotaisan.thoi_gian_sd','phongban.ten_phong')
            ->distinct()
            ->get();
        return $data;
    }


    public function update_deleted($ma_ts,$deleted){
        $kq = DB::table($this->table)->where('ma_ts',$ma_ts)->update(['deleted'=>$deleted]);
        return $kq;
    }

    public function delete_ts($ma_ts)
    {
        $kq = DB::table($this->table)->where('ma_ts',$ma_ts)->delete();
        return $kq;
    }

    public function so_ts_ncc($ma_ncc)
    {
        $data = DB::table('taisan')->where('taisan.ma_ncc',$ma_ncc)->get();
        return $data;
    }
    public function export_baocao_ts($ma_phong,$ma_loai,$trangthai){
        $temp_sl = DB::table($this->table)
        ->select('taisan.ma_ts',DB::raw('count(chitiettaisan.ma_ts) as soluong'))
        ->join('chitiettaisan','taisan.ma_ts','=','chitiettaisan.ma_ts')
        ->join('phongban','phongban.ma_phong','=','chitiettaisan.ma_phong')->where('chitiettaisan.trangthai','!=',2);
        if($ma_phong !=''){
            $temp_sl = $temp_sl->where('phongban.ma_phong',$ma_phong);
        }
        if($trangthai == 1){
            $temp_sl = $temp_sl->where('taisan.deleted',1);
        }else{
            $temp_sl = $temp_sl->where('taisan.deleted',0);
        }
        $temp_sl = $temp_sl->groupBy('taisan.ma_ts');
        $data = DB::table($this->table)
            ->join('loaitaisancodinh','taisan.ma_loai','=','loaitaisancodinh.ma_loai')
            ->join('nhacungcap','taisan.ma_ncc','=','nhacungcap.ma_ncc')
            ->join('tieuhaotaisan','tieuhaotaisan.ma_loai','=','taisan.ma_loai')
            ->join('chitiettaisan','chitiettaisan.ma_ts','=','taisan.ma_ts')
            ->join('phongban','phongban.ma_phong','=','chitiettaisan.ma_phong')
            ->joinSub($temp_sl,'temp_sl',function($join){
                $join->on('taisan.ma_ts','=','temp_sl.ma_ts');
            })
            ->select('taisan.*','soluong','nhacungcap.ten_ncc','loaitaisancodinh.ten_loai','tieuhaotaisan.muc_tieuhao','tieuhaotaisan.thoi_gian_sd','phongban.ten_phong');
            if($ma_phong !=''){
                $data = $data->where('phongban.ma_phong',$ma_phong);
            }
            if($ma_loai !=''){
                $data = $data->where('taisan.ma_loai',$ma_loai);
            }

            if($trangthai ==1){
                $data = $data->where('taisan.deleted',1);
            }else{
                $data = $data->where('taisan.deleted',0);
            }
            $data = $data->distinct()->get();
        return $data;
    }

    public function ts_thanhly($ma_phong=''){
        $temp_sl = DB::table($this->table)
            ->select('taisan.ma_ts',DB::raw('count(chitiettaisan.ma_ts) as soluong'),'chitietphieu.ma_thanhly as ma_thanhly')
            ->join('chitiettaisan','taisan.ma_ts','=','chitiettaisan.ma_ts')
            ->join('phongban','phongban.ma_phong','=','chitiettaisan.ma_phong')
            ->join('chitietphieu','chitietphieu.ma_chitiet','=','chitiettaisan.ma_chitiet')
            ->where('chitiettaisan.trangthai',2);
            if($ma_phong !=''){
                $temp_sl = $temp_sl->where('phongban.ma_phong',$ma_phong);
            }
            $temp_sl=$temp_sl->groupBy('taisan.ma_ts','chitietphieu.ma_thanhly');
        $data = DB::table($this->table)
            ->select('taisan.*','soluong','ma_thanhly','nhacungcap.ten_ncc','loaitaisancodinh.ten_loai','tieuhaotaisan.muc_tieuhao','tieuhaotaisan.thoi_gian_sd')
            ->join('loaitaisancodinh','taisan.ma_loai','=','loaitaisancodinh.ma_loai')
            ->join('nhacungcap','taisan.ma_ncc','=','nhacungcap.ma_ncc')
            ->join('tieuhaotaisan','tieuhaotaisan.ma_loai','=','taisan.ma_loai')
            ->joinSub($temp_sl,'temp_sl',function($join){
                $join->on('taisan.ma_ts','=','temp_sl.ma_ts');
            })->paginate(8);
        return $data;
    }
}
