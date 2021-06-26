<?php

namespace App\Http\Controllers;

use App\Models\Nhacungcap;
use Illuminate\Http\Request;

class NhacungcapController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $nhacungcap;

    public function __construct()
    {
        $this->middleware('login');
        $this->nhacungcap = new Nhacungcap;
    }
    public function index()
    {
        $ncc = $this->nhacungcap->select();        
        return view('layout.Nhacungcap',compact('ncc'));
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
