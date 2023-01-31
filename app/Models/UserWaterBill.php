<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserWaterBill extends Model
{
    use HasFactory;

    public function user(){
      return $this->belongsTo(User:class);
    }

    public function detail(){
      return $this->hasOne(WaterBillDetail::class);
    }
}
