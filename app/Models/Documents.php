<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Documents extends Model
{
    protected $fillable =[
        'id',
        'tieude',
        'noidung',
        'name_file'
    ];
}
