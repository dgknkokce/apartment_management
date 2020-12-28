<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'id' => 1,
        	'apartment_id' => 1,
        	'role_id' => 2,
        	'fullname' => 'Dodo',
        	'tel_no' => 123456789,
        	'email' => 'dododd@hotmail.com',
        	'password' => 123456,
        	'flat_no' => 24,
        	'payment_type' => 'owner',
        	'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
			'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
    }
}
