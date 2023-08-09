<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'address',
        'maps_link',
        'is_active'
    ];

    public function owner(){
        return $this->hasOne(User::class);
    }

    public function admin() {
        return $this->hasMany(User::class);
    }

    public function units() {
        return $this->hasMany(Unit::class);
    }

    public function parking() {
        return $this->hasMany(ParkingSlot::class);
    }
}
