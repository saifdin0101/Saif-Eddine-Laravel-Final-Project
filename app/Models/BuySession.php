<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BuySession extends Model
{
    //
    protected $fillable =[
        'user_id','sesin_id','pay'
    ];
}
