<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment_method extends Model
{
    public function receipt(){
        return $this->hasOne(receipt::class);
    }

    public function user(){
        return $this->belongsTo(user::class);
    }

    use HasFactory;
}
