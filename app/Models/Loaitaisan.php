<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Loaitaisan extends Model
{
    protected $fillable = [
        'ma_loai',
        'ten_loai',
        'mo_ta'
    ];
    public $table ='loaitaisan';

    public function select(){
        $loaits = DB::table($this->table)->get();
        return $loaits;
    }
}
