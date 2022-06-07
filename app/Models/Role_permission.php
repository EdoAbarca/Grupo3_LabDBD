<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role_permission extends Model
{
    public function permission(){
        return $this->belongsTo(permission::class);
    }

    public function role(){
        return $this->belongsTo(role::class);
    }

    use HasFactory;
}
