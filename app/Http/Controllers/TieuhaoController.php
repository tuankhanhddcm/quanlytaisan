<?php

namespace App\Http\Controllers;
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
    public $th;
    public $tieuhao;
    public function __construct()
    {
        $this->th = new Tieuhao;
        $this->tieuhao = new Tieuhao;
    }

    public function index()
    {
        $th = $this->th->selectth();
        return view('tieuhao.Tieuhao',['tieuhao' => $th]);
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
        $data = DB::table('tieuhaotaisan')->where('ma_tieuhao','=',$id)->first();
        return view('layout.suatieuhao', ['data' => $data]);
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
        $result=$this->tieuhao->updateth($id,$request->muc_tieuhao,$request->thoigian_sd);
        
        if($result){
            echo '<meta http-equiv="refresh" content="0; url=/tieuhao">';
        }
       
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

    public function find_tieuhao(Request $request){
        if($request->ajax()){
            $data = $this->tieuhao->find_by_ts($request->ma_loai);
            echo json_encode($data) ;
        }
    }
}
