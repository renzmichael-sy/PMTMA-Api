<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserParkingContract extends Model
{
    use HasFactory;

    public function parkingSlot(){
      return $this->hasOne(ParkingSlot::class);
    }

    public function user(){
      return $this->belongsTo(User::class);
    }
}
