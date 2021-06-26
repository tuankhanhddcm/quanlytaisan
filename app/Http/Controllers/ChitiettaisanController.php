<?php

namespace App\Http\Controllers;

use App\Models\Chitiettaisan;
use App\Models\Nhacungcap;
use App\Models\Phongban;
use App\Models\Taisan;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Types\This;

class ChitiettaisanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $phongban;
    protected $nhacungcap;
    protected $taisan;
    protected $chitiettaisan;
    public function __construct()
    {
        $this->middleware('login');
        $this->phongban = new Phongban;
        $this->nhacungcap = new Nhacungcap;
        $this->taisan = new Taisan;
        $this->chitiettaisan = new Chitiettaisan;
    }
    
    public function index()
    {
        $taisan = $this->taisan->select();
        $nhacungcap = $this->nhacungcap->select();
        $chitiettaisan = $this->chitiettaisan->select();
        return view('chitiettaisan.Chitiettaisan',compact('taisan','chitiettaisan','nhacungcap'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $phongban = $this->phongban->select();
        $nhacungcap = $this->nhacungcap->select();
        $taisan = $this->taisan->select();
        return view('chitiettaisan.insert',compact('phongban','nhacungcap','taisan'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $row = $this->chitiettaisan->select()->total();
        $max_id = $this->chitiettaisan->max_id('id_chitiet','CTS');
        if ($max_id !== null) {
            $id = (int)(str_replace('CTS','', $max_id->id_chitiet)) + 1;
        } else {
            $id = $row + 1;
        }
        if ($id < 10) {
            $id_chitiet = 'CTS00000' . ($id);
        } else if ($id < 100) {
            $id_chitiet = 'CTS0000' . ($id);
        } else if ($id < 1000) {
            $id_chitiet = 'CTS000' . ($id);
        } else if ($id < 10000) {
            $id_chitiet = 'CTS00' . ($id);
        } else if ($id < 100000) {
            $id_chitiet = 'CTS0' . ($id);
        } else if ($id < 1000000) {
            $id_chitiet = 'CTS' . ($id);
        }
        $date = date("Y-m-d H:i:s", time());
        $kq =$this->chitiettaisan->insert($id_chitiet,$request->tents,$request->ma_loai,$request->so_hieu,
            $request->ngia,$request->ncc,$request->nuoc_sx,$request->nsx,1,0,$request->sl,$date,$request->phongban);
        if($kq){
            return redirect('/chitiettaisan');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
