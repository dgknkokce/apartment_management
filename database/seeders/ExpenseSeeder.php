<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class ExpenseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('expenses')->insert([
            'id' => 1,
        	'monthlyexpense_id' => 1,
        	'amount' => 100,
        	'date' => 1,
        	'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
			'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('expenses')->insert([
            'id' => 2,
        	'monthlyexpense_id' => 2,
        	'amount' => 100,
        	'date' => 2,
        	'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
			'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('expenses')->insert([
            'id' => 3,
        	'monthlyexpense_id' => 3,
        	'amount' => 100,
        	'date' => 3,
        	'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
			'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('expenses')->insert([
            'id' => 4,
        	'monthlyexpense_id' => 4,
        	'amount' => 100,
        	'date' => 4,
        	'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
			'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('expenses')->insert([
            'id' => 5,
        	'monthlyexpense_id' => 5,
        	'amount' => 100,
        	'date' => 5,
        	'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
			'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('expenses')->insert([
            'id' => 6,
        	'monthlyexpense_id' => 6,
        	'amount' => 100,
        	'date' => 6,
        	'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
			'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('expenses')->insert([
            'id' => 7,
        	'monthlyexpense_id' => 7,
        	'amount' => 100,
        	'date' => 7,
        	'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
			'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('expenses')->insert([
            'id' => 8,
        	'monthlyexpense_id' => 8,
        	'amount' => 100,
        	'date' => 8,
        	'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
			'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('expenses')->insert([
            'id' => 9,
        	'monthlyexpense_id' => 9,
        	'amount' => 100,
        	'date' => 9,
        	'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
			'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('expenses')->insert([
            'id' => 10,
        	'monthlyexpense_id' => 10,
        	'amount' => 100,
        	'date' => 10,
        	'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
			'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('expenses')->insert([
            'id' => 11,
        	'monthlyexpense_id' => 11,
        	'amount' => 100,
        	'date' => 11,
        	'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
			'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('expenses')->insert([
            'id' => 12,
        	'monthlyexpense_id' => 12,
        	'amount' => 100,
        	'date' => 12,
        	'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
			'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

    }
}
