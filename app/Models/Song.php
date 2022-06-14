<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Song extends Model
{
    public function album(){
        return $this->belongsTo(album::class);
    }

    public function rate(){
        return $this->hasMany(rate::class);
    }

    public function song_playlist(){
        return $this->hasMany(song_playlist::class);
    }

    public function song_genre(){
        return $this->hasMany(song_genre::class);
    }

    public function like(){
        return $this->hasMany(like::class);
    }

    public function location(){
        return $this->hasOne(location::class);
    }    

    use HasFactory;
}
