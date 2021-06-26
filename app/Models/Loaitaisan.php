<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Loaitaisan extends Model
{
    protected $table ='loai';
    protected $fillable = [
        'ten_loai',
    ];
    

    public function select(){
        $loaits = DB::table($this->table)->paginate(8);
        return $loaits;
    }
    public function insert($ten_loai){
        $table=DB::table($this->table)->insert([
            'ten_loai' =>$ten_loai,
        ]);
        return $table;
    }

    public function search($text){
        $loai = DB::table($this->table);
        if($text !=''){
            $loai = $loai->where('ten_loai','like','%'.$text.'%');
                
        }
        $loai = $loai->paginate(8);
        return $loai;
    }
}
