<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Body extends Model
{
    //
    protected $fillable =[
 'height','weight','user_id','bodytype','calories'
    ];
}
