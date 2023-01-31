<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tenant extends Model
{
    use HasFactory;

    protected $fillable = [
      'first_name',
      'last_name',
      'contact_number',
      'occupation',
      'gender',
      'birthday',
      'user_id'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'birthday' => 'date'
    ];

    public function user(){
      return $this->belongsTo(User::class);
    }
}
