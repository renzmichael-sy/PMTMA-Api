<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Unit;
use Carbon\Carbon;

class UnitsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Clear Existing Units
        Unit::truncate();

        for($i = 1; $i < 6; $i++) {
          Unit::create([
            'name' => $i.'A',
            'capacity' => 3,
            'type_id' => 1,
            'price' => 8000.00,
            'is_active' => 1,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
          ]);
        }
    }
}
