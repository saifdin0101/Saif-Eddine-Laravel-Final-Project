<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable,SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'approve',
        'image',
        'role',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
    public function trainers (){
        return $this->hasMany(Trainer::class);
    }
    public function sesins () {
        return $this->hasMany(Sesin::class);
    }
    public function exerciceSesins () {
        return $this->belongsToMany(Sesin::class,'Joins', 'user_id', 'sesin_id')->withTimestamps();;
    }
    public function favoriteExercises()
{
    return $this->belongsToMany(Exercice::class, 'favorites');
}
public function DoneExercice()
{
    return $this->belongsToMany(Exercice::class, 'dones');
}
public function userBodyInfo (){
    return $this->hasMany(Body::class);
}
// public function sessions()
// {
//     return $this->belongsToMany(Sesin::class,'Buy_Sessions')->withPivot('pay');
// }
}
