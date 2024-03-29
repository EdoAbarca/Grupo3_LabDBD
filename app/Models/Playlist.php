<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Playlist extends Model
{
    public function song_playlist(){
        return $this->hasMany(song_playlist::class);
    }

    public function user(){
        return $this->belongsTo(user::class);
    }

    use HasFactory;
}
