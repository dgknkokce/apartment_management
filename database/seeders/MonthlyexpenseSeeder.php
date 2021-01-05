<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class MonthlyexpenseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('monthlyexpenses')->insert([
            'id' => 1,
        	'apartment_id' => 1,
        	'totalexpense' => 100,
        	'date' => 1,
        	'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
			'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('monthlyexpenses')->insert([
            'id' => 2,
        	'apartment_id' => 1,
        	'totalexpense' => 100,
        	'date' => 2,
        	'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
			'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
    }
}
