<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Exercice extends Model
{
    //
    protected $fillable = [
        'name',
        'image',
        'descreption',
        'time',
        'sesin_id',
        'calories',
        'location'
    ];
}
