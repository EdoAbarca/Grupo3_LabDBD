<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    public function role_permission(){
        return $this->hasMany(role_permission::class);
    }

    use HasFactory;
}
