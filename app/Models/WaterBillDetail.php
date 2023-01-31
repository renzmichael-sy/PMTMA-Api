<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WaterBillDetail extends Model
{
    use HasFactory;

    public function waterBills(){
      return $this->belongsTo(UnitWaterBill::class);
    }
}
