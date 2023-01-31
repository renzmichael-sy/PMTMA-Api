<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MeterReadingDetail extends Model
{
    use HasFactory;

    public function readings(){
      return $this->hasMany(MeterReading::class);
    }
}
