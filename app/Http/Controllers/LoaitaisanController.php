<?php

namespace App\Http\Controllers;

use App\Models\Loaitaisan;
use Illuminate\Http\Request;

use function Ramsey\Uuid\v1;

class LoaitaisanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $loaitaisan;

    public function __construct()
    {
        $this->middleware('login');
        $this->loaitaisan = new Loaitaisan;
    }
    public function index()
    {
        $loai = $this->loaitaisan->select();
        return view('loaitaisan.index',compact('loai'));
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
        $row = $this->loaitaisan->select()->total();
        $max_id = $this->loaitaisan->max_id('ma_loai','LTS');
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
        }
        $date = date("Y-m-d H:i:s", time());
        $this->loaitaisan->insert($ma_loai,$request->ten_loai,$request->mota_loai,$date);
        return redirect('loaits');
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

    public function search_loai(Request $request){
        if($request->ajax()){
            $loai = $this->loaitaisan->search($request->text);
            return view('loaitaisan.list_loai',compact('loai'));
        }
    }
}
