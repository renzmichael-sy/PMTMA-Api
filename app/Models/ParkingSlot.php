<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ParkingSlot extends Model
{
    use HasFactory;

    public function contract(){
      return $this->belongsTo(UserParkingContract::class);
    }

    public function property(){
      return $this->belongsTo(Property::class);
    }
}
