<?php

namespace App\Http\Controllers;

use App\Models\Loaitaisan;
use App\Models\LoaiTSCD;
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

    public function __construct()
    {
        $this->middleware('login');
        $this->loaiTSCD = new LoaiTSCD;
        $this->loaitaisan = new Loaitaisan;
        $this->tieuhao = new Tieuhao;
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
    public function show(LoaiTSCD $loaiTSCD)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\LoaiTSCD  $loaiTSCD
     * @return \Illuminate\Http\Response
     */
    public function edit(LoaiTSCD $loaiTSCD)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\LoaiTSCD  $loaiTSCD
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, LoaiTSCD $loaiTSCD)
    {
        //
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
}
