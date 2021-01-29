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
        DB::table('monthlyexpenses')->insert([
            'id' => 3,
            'apartment_id' => 1,
            'totalexpense' => 100,
            'date' => 3,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('monthlyexpenses')->insert([
            'id' => 4,
            'apartment_id' => 1,
            'totalexpense' => 100,
            'date' => 4,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('monthlyexpenses')->insert([
            'id' => 5,
            'apartment_id' => 1,
            'totalexpense' => 100,
            'date' => 5,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('monthlyexpenses')->insert([
            'id' => 6,
            'apartment_id' => 1,
            'totalexpense' => 100,
            'date' => 6,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('monthlyexpenses')->insert([
            'id' => 7,
            'apartment_id' => 1,
            'totalexpense' => 100,
            'date' => 7,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('monthlyexpenses')->insert([
            'id' => 8,
            'apartment_id' => 1,
            'totalexpense' => 100,
            'date' => 8,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('monthlyexpenses')->insert([
            'id' => 9,
            'apartment_id' => 1,
            'totalexpense' => 100,
            'date' => 9,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('monthlyexpenses')->insert([
            'id' => 10,
            'apartment_id' => 1,
            'totalexpense' => 100,
            'date' => 10,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('monthlyexpenses')->insert([
            'id' => 11,
            'apartment_id' => 1,
            'totalexpense' => 100,
            'date' => 11,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('monthlyexpenses')->insert([
            'id' => 12,
            'apartment_id' => 1,
            'totalexpense' => 100,
            'date' => 12,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        DB::table('monthlyexpenses')->insert([
            'id' => 13,
            'apartment_id' => 2,
            'totalexpense' => 100,
            'date' => 1,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('monthlyexpenses')->insert([
            'id' => 14,
            'apartment_id' => 2,
            'totalexpense' => 100,
            'date' => 2,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('monthlyexpenses')->insert([
            'id' => 15,
            'apartment_id' => 2,
            'totalexpense' => 100,
            'date' => 3,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('monthlyexpenses')->insert([
            'id' => 16,
            'apartment_id' => 2,
            'totalexpense' => 100,
            'date' => 4,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('monthlyexpenses')->insert([
            'id' => 17,
            'apartment_id' => 2,
            'totalexpense' => 100,
            'date' => 5,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('monthlyexpenses')->insert([
            'id' => 18,
            'apartment_id' => 2,
            'totalexpense' => 100,
            'date' => 6,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('monthlyexpenses')->insert([
            'id' => 19,
            'apartment_id' => 2,
            'totalexpense' => 100,
            'date' => 7,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('monthlyexpenses')->insert([
            'id' => 20,
            'apartment_id' => 2,
            'totalexpense' => 100,
            'date' => 8,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('monthlyexpenses')->insert([
            'id' => 21,
            'apartment_id' => 2,
            'totalexpense' => 100,
            'date' => 9,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('monthlyexpenses')->insert([
            'id' => 22,
            'apartment_id' => 2,
            'totalexpense' => 100,
            'date' => 10,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('monthlyexpenses')->insert([
            'id' => 23,
            'apartment_id' => 2,
            'totalexpense' => 100,
            'date' => 11,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('monthlyexpenses')->insert([
            'id' => 24,
            'apartment_id' => 2,
            'totalexpense' => 100,
            'date' => 12,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
    }
}
