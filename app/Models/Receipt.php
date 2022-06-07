<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Receipt extends Model
{
    public function Payment_method(){
        return $this->belongsTo(Payment_method::class);
    }

    public function user(){
        return $this->belongsTo(user::class);
    }

    use HasFactory;
}
