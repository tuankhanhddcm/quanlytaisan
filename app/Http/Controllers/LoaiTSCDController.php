<?php

namespace App\Http\Controllers;

use App\Models\Loaitaisan;
use App\Models\LoaiTSCD;
use App\Models\Taisan;
use App\Models\Tieuhao;
use Carbon\Carbon;
use Illuminate\Http\Request;

class LoaiTSCDController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    protected $loaiTSCD;
    protected $loaitaisan;
    protected $tieuhao;
    protected $taisan;
    public function __construct()
    {
        $this->middleware('login');
        $this->loaiTSCD = new LoaiTSCD;
        $this->loaitaisan = new Loaitaisan;
        $this->tieuhao = new Tieuhao;
        $this->taisan = new Taisan;
    }
    public function index()
    {
        $loaiTSCD=$this->loaiTSCD->select();
        $loai=$this->loaitaisan->select();
        return view('loaiTSCĐ.index',compact('loaiTSCD','loai'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $row = $this->loaiTSCD->select()->total();
        $max_id = $this->loaiTSCD->max_id('ma_loai','LTS');
        if ($max_id !== null) {
            $id = (int)(str_replace('LTS','', $max_id->ma_loai)) + 1;
        } else {
            $id = $row + 1;
        }
        if ($id < 10) {
            $ma_loai = 'LTS00000' . ($id);
        } else if ($id < 100) {
            $ma_loai = 'LTS0000' . ($id);
        } else if ($id < 1000) {
            $ma_loai = 'LTS000' . ($id);
        } else if ($id < 10000) {
            $ma_loai = 'LTS00' . ($id);
        } else if ($id < 100000) {
            $ma_loai = 'LTS0' . ($id);
        } else if ($id < 1000000) {
            $ma_loai = 'LTS' . ($id);
        }else{
            $ma_loai = 'LTS'.($id+1);
        }
        $kq = $this->loaiTSCD->insert($ma_loai,$request->tents,$request->loaits);
        if($kq){
            $row = $this->tieuhao->select()->total();
            $max_id = $this->tieuhao->max_id('ma_tieuhao','TH');
            if ($max_id !== null) {
                $id = (int)(str_replace('TH','', $max_id->ma_tieuhao)) + 1;
            } else {
                $id = $row + 1;
            }
            if ($id < 10) {
                $ma_tieuhao = 'TH00000' . ($id);
            } else if ($id < 100) {
                $ma_tieuhao = 'TH0000' . ($id);
            } else if ($id < 1000) {
                $ma_tieuhao = 'TH000' . ($id);
            } else if ($id < 10000) {
                $ma_tieuhao = 'TH00' . ($id);
            } else if ($id < 100000) {
                $ma_tieuhao = 'TH0' . ($id);
            } else if ($id < 1000000) {
                $ma_tieuhao = 'TH' . ($id);
            }else{
                $ma_tieuhao = 'TH'.($id+1);
            }
            if($this->tieuhao->insert($ma_tieuhao,$request->tile_HM,$request->tgSD,$ma_loai,'')){
                return redirect('/loaiTSCD');
            }
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\LoaiTSCD  $loaiTSCD
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $loaiTSCD = $this->loaiTSCD->find($id);
        $taisan = $this->taisan->select($loaiTSCD->ma_loai);
        return view('loaiTSCĐ.detail_loai',compact('loaiTSCD','taisan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\LoaiTSCD  $loaiTSCD
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        $TSCD = $this->loaiTSCD->find($id);
        $loai=$this->loaitaisan->select();
        return view('loaiTSCĐ.modal',compact('TSCD','loai'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\LoaiTSCD  $loaiTSCD
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $kq = $this->loaiTSCD->update_loai($id,$request->tents_up,$request->loaits_up);
        if($kq){
            if($this->tieuhao->updateth($request->ma_tieuhao,$request->tile_HM_up,$request->tgSD_up)){
                return redirect('loaiTSCD');
            }
            
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\LoaiTSCD  $loaiTSCD
     * @return \Illuminate\Http\Response
     */
    public function destroy(LoaiTSCD $loaiTSCD)
    {
        //
    }
    public function search_loai(Request $request){
        if($request->ajax()){
            $text=$request->text;
            $seleted =$request->seleted;
            $loaiTSCD = $this->loaiTSCD->select();
            if($text !='' || $seleted !=''){
                $loaiTSCD = $this->loaiTSCD->search($text,$seleted);
            }
            return view('loaiTSCĐ.list_loai',compact('loaiTSCD'));
        }
    }
}
