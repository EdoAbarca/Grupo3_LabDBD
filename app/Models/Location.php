<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    public function song(){
        return $this->hasMany(location::class);
    }

    use HasFactory;
}
