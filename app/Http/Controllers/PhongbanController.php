<?php

namespace App\Http\Controllers;

use App\Models\Chitiettaisan;
use App\Models\Phongban;
use App\Models\Taisan;
use Illuminate\Http\Request;
use Alert;

class PhongbanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $phongban;
    protected $chitiettaisan;
    protected $taisan;

    public function __construct()
    {
        $this->middleware('login');
        $this->phongban = new Phongban;
        $this->chitiettaisan = new Chitiettaisan;
        $this->taisan = new Taisan;
    }
    public function index()
    {
        $phongban = $this->phongban->select();
        $sl_ts = $this->chitiettaisan->sl_ts_phong();
        foreach($phongban as $val){
            $val->soluong = 0;
            foreach($sl_ts as $item){
                if($val->ma_phong == $item->ma_phong){
                    $val->soluong =$item->soluong;
                }
            }
        }
        return view('phongban.index',compact('phongban'));
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
        $row = $this->phongban->select()->total();
        $max_id = $this->phongban->max_id('ma_phong','PB');
        if ($max_id !== null) {
            $id = (int)(str_replace('PB','', $max_id->ma_phong)) + 1;
        } else {
            $id = $row + 1;
        }
        if ($id < 10) {
            $ma_phong = 'PB00000' . ($id);
        } else if ($id < 100) {
            $ma_phong = 'PB0000' . ($id);
        } else if ($id < 1000) {
            $ma_phong = 'PB000' . ($id);
        } else if ($id < 10000) {
            $ma_phong = 'PB00' . ($id);
        } else if ($id < 100000) {
            $ma_phong = 'PB0' . ($id);
        } else if ($id < 1000000) {
            $ma_phong = 'PB' . ($id);
        }
        $date = date("Y-m-d H:i:s", time());
        $data=$this->phongban->insert($ma_phong,$request->ten_phong,$request->mo_ta,$date);
        if(!$request->ajax()){
            Alert::alert()->success('Thêm phòng ban thành công!!!')->autoClose(5000);
            return redirect('/phongban');
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
        $phongban = $this->phongban->find($id);
        $sl_ts = $this->chitiettaisan->sl_ts_phong();
        $phongban->soluong = 0;
        foreach($sl_ts as $item){
            if($phongban->ma_phong == $item->ma_phong){
                $phongban->soluong =$item->soluong;
            }
        }
        $taisan = $this->taisan->sl_taisan_phong($id);
        return view('phongban.detail_phong',compact('phongban','taisan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $phong = $this->phongban->find($id);
        return view('phongban.modal_update_phongban',compact('phong'));
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
        $kq = $this->phongban->update_phong($id,$request->ten_phong,$request->mota);

        Alert::alert()->success('Sửa phòng ban thành công!!!')->autoClose(5000);
        return redirect('/phongban');
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
    public function search_phong(Request $request)
    {
        if($request->ajax()){
            $text = $request->text;
            $phongban = $this->phongban->select();
            if($text != ''){
                $phongban = $this->phongban->search_phongban($text);
            }
            return view('phongban.list_phong',compact('phongban'));

        }
    }
}
