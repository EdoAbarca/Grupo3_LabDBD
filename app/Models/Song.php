<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Song extends Model
{
    public function album(){
        return $this->belongsTo(album::class);
    }

    //hay q arreglarlo, cambiamos el mr de location
    public function location(){
        return $this->belongsTo(location::class);
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

    use HasFactory;
}
