<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    public function user(){
        return $this->belongsTo(user::class);
    }

    public function song(){
        return $this->belongsTo(song::class);
    }
    
    use HasFactory;
}
