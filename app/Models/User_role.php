<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User_role extends Model
{
    public function role(){
        return $this->belongsTo(role::class);
    }

    public function user(){
        return $this->belongsTo(user::class);
    }

    use HasFactory;
}
