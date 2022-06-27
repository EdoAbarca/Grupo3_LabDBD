<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    public function follow(){
        return $this->hasMany(follow::class);
    }

    public function playlist(){
        return $this->hasMany(playlist::class);
    }

    public function like(){
        return $this->hasMany(like::class);
    }

    public function rate(){
        return $this->hasMany(rate::class);
    }

    public function album(){
        return $this->hasMany(album::class);
    }

    public function payment_method(){
        return $this->hasMany(payment_method::class);
    }

    public function role(){
        return $this->belongsTo(role::class);
    }

    public function location(){
        return $this->belongsTo(location::class);
    }

    public function receipt(){
        return $this->hasOne(receipt::class);
    }

    use HasApiTokens, HasFactory, Notifiable;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
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
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
