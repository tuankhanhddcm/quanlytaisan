<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class Tieuhao extends Model
{
    public $table = "tieuhaotaisan";
    public function select()
    {   
        $th = DB::table($this->table)->paginate(8);
        return $th;
    }
   
    
    public function find_by_ts($ma_ts){
        $data = DB::table($this->table)->where('ma_loai','=',''.$ma_ts.'')->first();
        return $data;
    }
}
