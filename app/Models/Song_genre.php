<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Song_genre extends Model
{
    public function genre(){
        return $this->belongsTo(genre::class);
    }

    public function song(){
        return $this->belongsTo(song::class);
    }

    use HasFactory;
}
