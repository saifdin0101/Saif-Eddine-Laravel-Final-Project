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
        'user_id'
    ];


    public function user () {
        return $this->belongsTo(User::class);
    }
}
