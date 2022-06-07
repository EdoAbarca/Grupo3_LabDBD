<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Song_playlist extends Model
{
    public function song(){
        return $this->belongsTo(song::class);
    }

    public function playlist(){
        return $this->belongsTo(playlist::class);
    }

    use HasFactory;
}
