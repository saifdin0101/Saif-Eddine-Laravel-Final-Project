<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sesin extends Model
{
    //
    protected $fillable = [
        'name',
        'start_time',
        'end_time',
        'image',
        'user_id',
        'pay',
        'premium'
    ];


    public function user () {
        return $this->belongsTo(User::class);
    }
    public function users () {
        return $this->belongsToMany(User::class,'Joins');
    }
    // public function userss()
    // {
    //     return $this->belongsToMany(User::class ,'Buy_Sessions')->withPivot('pay');
    // }
}
