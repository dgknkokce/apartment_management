<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class IncomeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('incomes')->insert([
            'id' => 1,
        	'incometype_id' => 1,
        	'apartment_id' => 1,
        	'amount' => 3000,
        	'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
			'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('incomes')->insert([
            'id' => 2,
            'incometype_id' => 1,
            'apartment_id' => 1,
            'amount' => 6000,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
    }
}
