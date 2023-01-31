<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserHousehold extends Model
{
    use HasFactory;

    protected $fillable = [
      'primary_tenant_id',
      'household_id',
      'is_active'
    ];

    public function primaryTenant(){
      return $this->belongsTo(User::class);
    }
}
