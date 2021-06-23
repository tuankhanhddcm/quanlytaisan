<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTaisan;
use App\Models\Loaitaisan;
use App\Models\Taisan;

use Illuminate\Http\Request;

class TaisanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
  
    public $loaitaisan ;
    public $taisan;
    public function __construct()
    {
        $this->loaitaisan= new Loaitaisan;
        $this->taisan = new Taisan;
        $this->middleware('login');
    }
    
    public function index()
    {
        $ts = $this->taisan->select();
        $loai = $this->loaitaisan->select();
        return view('layout.list_taisan',[
                    'taisan'=>$ts,
                    'loaits' =>$loai
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
        $loai = $this->loaitaisan->select();
        return view('layout.insert_taisan',['loaits' =>$loai]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTaisan $request)
    {
        $row = count($this->taisan->select());
        $max_id = $this->taisan->max_id('ma_ts','TS');
        if ($max_id !== null) {
            $id = (int)(str_replace('TS','', $max_id->ma_ts)) + 1;
        } else {
            $id = $row + 1;
        }
        if ($id < 10) {
            $ma_ts = 'TS00000' . ($id);
        } else if ($id < 100) {
            $ma_ts = 'TS0000' . ($id);
        } else if ($id < 1000) {
            $ma_ts = 'TS000' . ($id);
        } else if ($id < 10000) {
            $ma_ts = 'TS00' . ($id);
        } else if ($id < 100000) {
            $ma_ts = 'TS0' . ($id);
        } else if ($id < 1000000) {
            $ma_ts = 'TS' . ($id);
        }
        $date = date("Y-m-d H:i:s", time());
        $insert = $this->taisan->insert($ma_ts,$request->taisan,$request->soluong,$request->loaits,$request->mota,$date);
        if($insert){
            return redirect('/taisan/create')
            ->with('message', 'Sản phẩm được tạo thành công với ID: ' . $ma_ts);
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
        $taisan = $this->taisan->show_ts($id);
        $loai = $this->loaitaisan->select();
        return view('layout.Themtaisan',['taisan'=>$taisan,'loaits'=>$loai]);
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

    public function search_ts(){
        if(isset($_POST['text']) && isset($_POST['seleted'])){
            $text=$_POST['text'];
            $seleted =$_POST['seleted'];
            $kq = $this->taisan->search_taisan($text,$seleted);
            $output = '';
            $i=1;
            foreach($kq as $val){
                
                $output .='
                <tr>
                    <td>'.$i.'</td>
                    <td><a href="/taisan/'.$val->ma_ts.'" >'.$val->ma_ts.'</a></td>
                    <td>'.$val->ten_ts.'</td>
                    <td>'.$val->soluong.'</td>
                    <td>'.$val->ten_loai.'</td>
                    <td></td>
                </tr>
                ';
                $i+=1;
            }
            echo $output;
        }
    }
}
