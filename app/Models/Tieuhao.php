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
   
    
   
}
