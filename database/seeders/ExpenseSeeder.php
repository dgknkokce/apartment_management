<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Carbon\Carbon;


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
            'name' => 'water',
        	'monthlyexpense_id' => 1,
        	'amount' => 100,
        	'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
			'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('expenses')->insert([
            'id' => 2,
            'name' => 'water',
        	'monthlyexpense_id' => 2,
        	'amount' => 100,
        	'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
			'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('expenses')->insert([
            'id' => 3,
            'name' => 'water',
        	'monthlyexpense_id' => 3,
        	'amount' => 100,
        	'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
			'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('expenses')->insert([
            'id' => 4,
            'name' => 'water',
        	'monthlyexpense_id' => 4,
        	'amount' => 100,
        	'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
			'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('expenses')->insert([
            'id' => 5,
            'name' => 'water',
        	'monthlyexpense_id' => 5,
        	'amount' => 100,
        	'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
			'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('expenses')->insert([
            'id' => 6,
            'name' => 'water',
        	'monthlyexpense_id' => 6,
        	'amount' => 100,
        	'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
			'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('expenses')->insert([
            'id' => 7,
            'name' => 'water',
        	'monthlyexpense_id' => 7,
        	'amount' => 100,
        	'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
			'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('expenses')->insert([
            'id' => 8,
            'name' => 'water',
        	'monthlyexpense_id' => 8,
        	'amount' => 100,
        	'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
			'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('expenses')->insert([
            'id' => 9,
            'name' => 'water',
        	'monthlyexpense_id' => 9,
        	'amount' => 100,
        	'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
			'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('expenses')->insert([
            'id' => 10,
            'name' => 'water',
        	'monthlyexpense_id' => 10,
        	'amount' => 100,
        	'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
			'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('expenses')->insert([
            'id' => 11,
            'name' => 'water',
        	'monthlyexpense_id' => 11,
        	'amount' => 100,
        	'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
			'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('expenses')->insert([
            'id' => 12,
            'name' => 'water',
        	'monthlyexpense_id' => 12,
        	'amount' => 100,
        	'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
			'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

    }
}
