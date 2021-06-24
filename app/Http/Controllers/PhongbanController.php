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
        return view('layout.Phongban',compact('phongban'));
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
        $max_id = $this->phongban->max_id('ma_phong','TS');
        if ($max_id !== null) {
            $id = (int)(str_replace('TS','', $max_id->ma_phong)) + 1;
        } else {
            $id = $row + 1;
        }
        if ($id < 10) {
            $ma_phong = 'TS00000' . ($id);
        } else if ($id < 100) {
            $ma_phong = 'TS0000' . ($id);
        } else if ($id < 1000) {
            $ma_phong = 'TS000' . ($id);
        } else if ($id < 10000) {
            $ma_phong = 'TS00' . ($id);
        } else if ($id < 100000) {
            $ma_phong = 'TS0' . ($id);
        } else if ($id < 1000000) {
            $ma_phong = 'TS' . ($id);
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
