<?php

namespace App\Http\Controllers;

use App\Models\Nhacungcap;
use Illuminate\Http\Request;
use Alert;
use App\Models\Taisan;
use App\Models\Taisans;

class NhacungcapController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $nhacungcap;
    protected $taisan;

    public function __construct()
    {
        $this->middleware('login');
        $this->nhacungcap = new Nhacungcap;
        $this->taisan = new Taisan;
    }
    public function index()
    {
        $ncc = $this->nhacungcap->select();        
        return view('nhacungcap.index',compact('ncc'));
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
        $row = $this->nhacungcap->select()->total();
        $max_id = $this->nhacungcap->max_id('ma_ncc','NCC');
        if ($max_id !== null) {
            $id = (int)(str_replace('NCC','', $max_id->ma_ncc)) + 1;
        } else {
            $id = $row + 1;
        }
        if ($id < 10) {
            $ma_ncc = 'NCC00000' . ($id);
        } else if ($id < 100) {
            $ma_ncc = 'NCC0000' . ($id);
        } else if ($id < 1000) {
            $ma_ncc = 'NCC000' . ($id);
        } else if ($id < 10000) {
            $ma_ncc = 'NCC00' . ($id);
        } else if ($id < 100000) {
            $ma_ncc = 'NCC0' . ($id);
        } else if ($id < 1000000) {
            $ma_ncc = 'NCC' . ($id);
        }
        $date = date("Y-m-d H:i:s", time());
        $this->nhacungcap->insert($ma_ncc,$request->ten_ncc,$request->sdt_ncc,$request->email_ncc,$request->diachi_ncc,$date);
        if(!$request->ajax()){
            Alert::alert()->success('Thêm nhà cung cấp thành công!!!')->autoClose(5000);
            return redirect('/nhacungcap');
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $NCC = $this->nhacungcap->find($id);
        return view('nhacungcap.modal_updatencc',compact('NCC'));
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
        $kq =$this->nhacungcap->update_ncc($id,$request->ten_ncc,$request->sdt,$request->email,$request->dia_chi);
        if($kq){
            Alert::alert()->success('Sửa nhà cung cấp thành công!!!')->autoClose(5000);
        }
        return redirect('/nhacungcap');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $ma_ncc = $request->ma_ncc;
        $so_ts_cc = $this->taisan->so_ts_ncc($ma_ncc);
        if(count($so_ts_cc) == 0){
            $this->nhacungcap->delete_ncc($ma_ncc);
            return true;
        }else{
            return false;
        }
    }
    public function search_nhacungcap(Request $request)
    {
        $text = $request->text;
        if($text!=''){
            $ncc = $this->nhacungcap->search_ncc($text);
        }else{
            $ncc = $this->nhacungcap->select();
        }
        return view('nhacungcap.list_nhacungcap',compact('ncc'));
    }
}