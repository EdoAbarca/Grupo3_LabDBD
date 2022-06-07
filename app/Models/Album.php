<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    public function song(){
        return $this->hasMany(song::class);
    }

    public function user(){
        return $this->belongsTo(user::class);
    }

    use HasFactory;
}
