<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\UnitType;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class UnitTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        UnitType::truncate();
        DB::table('unit_types')->insert([
          [
            'name' => 'One Bedroom Unit',
            'description' => '',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
          ],
          [
            'name' => 'Two Bedroom Unit',
            'description' => '',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
          ],
          [
            'name' => 'Studio Type',
            'description' => '',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
          ]
        ]);
    }
}
