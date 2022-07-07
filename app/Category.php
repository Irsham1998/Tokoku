<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
//tambahkan softdelete sesuai db
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name', 'photo', 'slug'
    ];

    protected $hidden = [

    ];
}
