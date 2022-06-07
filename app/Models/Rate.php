<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rate extends Model
{
    public function song(){
        return $this->belongsTo(song::class);
    }

    public function user(){
        return $this->belongsTo(user::class);
    }

    use HasFactory;
}
