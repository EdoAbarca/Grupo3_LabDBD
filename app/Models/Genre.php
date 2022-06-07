<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    public function song_genre(){
        return $this->hasMany(song_genre::class);
    }

    use HasFactory;
}
