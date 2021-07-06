<?php

namespace App\Http\Controllers;

use App\Models\Taisan;
use Illuminate\Support\Facades\DB;
use App\Models\Tieuhao;
use Illuminate\Http\Request;
class TieuhaoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public $tieuhao;
    protected $taisan;
    public function __construct()
    {
        $this->middleware('login');
        $this->tieuhao = new Tieuhao;
        $this->taisan = new Taisan;
    }

    public function index()
    {
        $tieuhao = $this->taisan->select();
        return view('tieuhao.Tieuhao',['tieuhao' => $tieuhao]);
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
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tieuhao  $tieuhao
     * @return \Illuminate\Http\Response
     */
    public function show($tieuhao)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tieuhao  $tieuhao
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tieuhao  $tieuhao
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tieuhao  $tieuhao
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function search_tieuhao(Request $request){
        if($request->ajax()){
            $text=$request->text;
            $tieuhao = $this->taisan->select();
            if($text !=''){
                $tieuhao = $this->taisan->search_taisan($text,'','');
            }
            return view('tieuhao.list_tieuhao',compact('tieuhao'));
        }
    }
    public function find_tieuhao(Request $request){
        if($request->ajax()){
            $data = $this->tieuhao->find_by_ts($request->ma_loai);
            echo json_encode($data) ;
        }
    }
}
