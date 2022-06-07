<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Follow extends Model
{
    public function user(){
        return $this->belongsTo(user::class);
    }

    use HasFactory;
}
