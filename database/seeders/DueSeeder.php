<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class DueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('dues')->insert([
            'id' => 1,
            'user_id' => '1',
        	'monthlyincome_id' => 1,
        	'amount' => 500,
        	'status' => false,
        	'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
			'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('dues')->insert([
            'id' => 3,
            'user_id' => '1',
            'monthlyincome_id' => 1,
            'amount' => 300,
            'status' => false,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('dues')->insert([
            'id' => 2,
            'user_id' => '2',
        	'monthlyincome_id' => 14,
        	'amount' => 100,
        	'status' => false,
        	'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
			'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
    }
}
