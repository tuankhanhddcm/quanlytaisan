<?php

namespace App\Http\Controllers;

use App\Models\Hopdong;
use Illuminate\Http\Request;
use App\Models\Nhacungcap;

class HopdongController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $nhacungcap;
    protected $hopdong;
    public function __construct()
    {
        $this->middleware('login');
        $this->nhacungcap = new Nhacungcap;
        $this->hopdong = new Hopdong;
    }
    public function index()
    {
        $nhacungcap = $this->nhacungcap->select();
        $hopdong = $this->hopdong->select();
        return view('hopdong.index',compact('hopdong','nhacungcap'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $nhacungcap = $this->nhacungcap->select();
        return view('hopdong.themhopdong',compact('nhacungcap'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Hopdong  $hopdong
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   
        $cttaisan = $this->hopdong->show_cttaisan($id);
        $cthopdong = $this->hopdong->show_chitiethd($id); 
        return view('hopdong.chitiethopdong',compact('cthopdong','cttaisan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Hopdong  $hopdong
     * @return \Illuminate\Http\Response
     */
    public function edit(Hopdong $hopdong)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Hopdong  $hopdong
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Hopdong $hopdong)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Hopdong  $hopdong
     * @return \Illuminate\Http\Response
     */
    public function destroy(Hopdong $hopdong)
    {
        //
    }
    public function search_hopdong(Request $request){
        if($request->ajax()){
            $text=$request->text;
            $seleted =$request->seleted;
            if($text !='' || $seleted !=''){
                $hopdong = $this->hopdong->search_hopdong($text,$seleted);
            }else{
                $hopdong = $this->hopdong->select();
            }
            return view('hopdong.list_hopdong',compact('hopdong'));
        }
    }
}
