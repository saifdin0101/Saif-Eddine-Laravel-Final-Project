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
        'location',
        'user_id',
        'premium'
    ];
    public function UserFavorites()
{
    return $this->belongsToMany(User::class, 'favorites');
}
public function UserDones()
{
    return $this->belongsToMany(User::class, 'dones');
}

}
