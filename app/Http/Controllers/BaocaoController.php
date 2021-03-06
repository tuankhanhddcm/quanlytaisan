<?php

namespace App\Http\Controllers;

use App\Exports\BaocaoTSExport;
use Illuminate\Http\Request;
use App\Exports\TaisanExport;
use App\Models\Chitiettaisan;
use App\Models\Loaitaisan;
use App\Models\LoaiTSCD;
use App\Models\Nhacungcap;
use App\Models\Nhanvien;
use App\Models\Phongban;
use App\Models\Taisan;
use App\Models\Thanhly;
use App\Models\Tieuhao;
use Carbon\Carbon;
use Maatwebsite\Excel\Facades\Excel;

class BaocaoController extends Controller
{
    public $loaitaisan ;
    public $taisan;
    protected $nhacungcap;
    protected $phongban;
    protected $chitiettaisan;
    protected $tieuhao;
    protected $loaiTSCD;
    protected $nhanvien;
    protected $thanhly;

    public function __construct()
    {
        $this->loaitaisan= new Loaitaisan;
        $this->taisan = new Taisan;
        $this->nhacungcap= new Nhacungcap;
        $this->phongban = new Phongban;
        $this->chitiettaisan = new Chitiettaisan;
        $this->tieuhao = new Tieuhao;
        $this->loaiTSCD = new LoaiTSCD;
        $this->thanhly = new Thanhly;
        $this->nhanvien = new Nhanvien;
        $this->middleware('login');
    }

    public function taisan(){
        // $data =$this->taisan->export_baocao_ts('','','');
        // echo '<pre/>';
        // print_r($data);
        $ts = $this->taisan->select();
        $loai = $this->loaiTSCD->select('all');
        $phongban = $this->phongban->select('all');
        $phongtaisan = $this->taisan->phong_taisan();
        return view('baocao.baocao_ts',[
                    'taisan'=>$ts,
                    'loaits' =>$loai,
                    'phongban' =>$phongban,
                    'phongts'=>$phongtaisan
        ]);
    }
    public function search_ts(Request $request){
        if($request->ajax()){
            $text=$request->text;
            $seleted =$request->seleted;
            $ma_phong =$request->ma_phong;
            $phongts = $this->taisan->phong_taisan();
            $ma_loai = $request->ma_loai;
            $deleted = $request->deleted;
            if($text !='' || $seleted !='' || $ma_phong !='' || $deleted !=null){
                $taisan = $this->taisan->search_taisan($text,$seleted,$ma_phong,$deleted);
            }elseif($ma_loai !=''){
                $taisan = $this->taisan->select($ma_loai);
            }elseif($request->phongban !=''){
                $taisan = $this->taisan->sl_taisan_phong($request->phongban);
                return view('baocao.list_taisan',compact('taisan'));
            }else{
                $taisan = $this->taisan->select();
            }
            return view('baocao.list_taisan',compact('taisan','phongts'));
        }
    }

    public function export(Request $request){
        $ma_phong =$request->ma_phong;
        $ma_loai = $request->ma_loai;
        $trangthai = $request->trangthai;
        if($ma_phong !='' || $trangthai !='' ||$ma_loai !=''){
            $data = $this->taisan->export_baocao_ts($ma_phong,$ma_loai,$trangthai);
            
        }else{
            $data = $this->taisan->select('','all');
        }
        
        $phongtaisan = $this->taisan->phong_taisan();
        return Excel::download(new BaocaoTSExport($data,$phongtaisan), 'danhsachtaisan.xlsx');
    }

    public function thanhly(){
        $phongban = $this->phongban->select();
        $taisan = $this->taisan->ts_thanhly();
        $phongts = $this->taisan->phong_taisan();
        $phieuthanhly = $this->thanhly->select('all');
        return view('baocao.baocao_thanhly',compact('taisan','phongts','phongban','phieuthanhly'));
    }
    public function search_thanhly(Request $request){
        if($request->ajax()){
            $ma_phong = $request->ma_phong;
            if($ma_phong !=''){
                $taisan = $this->taisan->ts_thanhly($ma_phong);
            }else{
                $taisan = $this->taisan->ts_thanhly();
            }
            $phieuthanhly = $this->thanhly->select('all');
            $phongts = $this->taisan->phong_taisan();
            return view('baocao.list_taisan_tl',compact('taisan','phongts','phieuthanhly'));
        }
    }
    public function export_tl(Request $request){
        $ma_phong =$request->ma_phong;
        if($ma_phong !=''){
            $data = $this->taisan->ts_thanhly($ma_phong);
        }else{
            $data = $this->taisan->ts_thanhly();
        }
        
        $phongtaisan = $this->taisan->phong_taisan();
        return Excel::download(new BaocaoTSExport($data,$phongtaisan), 'danhsachtaisan.xlsx');
    }
}
