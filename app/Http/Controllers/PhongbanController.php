<?php

namespace App\Http\Controllers;

use App\Models\Phongban;
use Illuminate\Http\Request;

class PhongbanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $phongban;

    public function __construct()
    {
        $this->middleware('login');
        $this->phongban = new Phongban;
    }
    public function index()
    {
        $phongban = $this->phongban->select();
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
        $this->phongban->update_phong($id,$request->ten_phong,$request->mota);
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
