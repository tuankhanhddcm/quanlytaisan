<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Chucvu extends Model
{
    protected $table = 'chucvu';
    
    public function select(){
        $data = DB::table($this->table)->get();
        return $data;
    }
}
