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
        'premium',
        'approve'
    ];


    public function user () {
        return $this->belongsTo(User::class);
    }
    public function users () {
        return $this->belongsToMany(User::class,'Joins', 'user_id', 'sesin_id')->withTimestamps();;
    }
    // public function userss()
    // {
    //     return $this->belongsToMany(User::class ,'Buy_Sessions')->withPivot('pay');
    // }
}
