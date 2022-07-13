<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $guarded = ['id'];


    protected $casts = [
        'created_at' => 'datetime:Y/m/d', // Change your format
        'updated_at' => 'datetime:Y/m/d',
    ];
}
