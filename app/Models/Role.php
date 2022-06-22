<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    public function role_permission(){
        return $this->hasMany(role_permission::class);
    }

    public function user(){
        return $this->hasMany(user::class);
    }

    use HasFactory;
}
