<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    //Relationships

    public function unitContracts(){
      return $this->hasMany(UserUnitContract::class);
    }

    public function parkingContracts(){
      return $this->hasMany(UserParkingContract::class);
    }

    public function waterBills(){
      return $this->hasMany(UserWaterBill::class);
    }

    public function households(){
      return $this->hasMany(UserHousehold::class, 'primary_tenant_id','id');
    }

    public function tenant(){
      return $this->hasOne(Tenant::class, 'user_id', 'id');
    }



    //Scopes

    public function scopeActive($query){
      return $query->where('is_active',1);
    }
}
