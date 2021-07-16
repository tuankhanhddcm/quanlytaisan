<?php

namespace App\Http\Controllers;

use App\Models\Loaitaisan;
use Illuminate\Http\Request;
use Alert;
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
        $kq=$this->loaitaisan->insert($request->ten_loai);
        if($kq){
            Alert::alert()->success('Thêm loại tài sản thành công!!!')->autoClose(5000);
        }
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
