<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use faker\Faker;
use App\Models\User;
use App\Models\UserRoles;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();

        $faker = \Faker\Factory::create();
        $password = Hash::make('1234');

        User::create([
          'first_name' => 'Renz',
          'last_name' => 'Sy',
          'email' => 'renzmichael.sy@gmail.com',
          'gender' => '0',
          'occupation' => 'Temporary Employee',
          'birthday' => '1991-08-07',
          'contact_number' => '07026164137',
          'password' => $password,
          'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
          'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ])->each(function ($user) {
          $role = UserRoles::create([
            'user_id' => $user->id,
            'role' => 1,
            'is_active'=> 1,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
          ]);
          $user->roles()->save($role);
        });
    }
}
