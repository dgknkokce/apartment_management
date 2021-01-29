<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\Hash;
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
        	'role_id' => 1,
        	'fullname' => 'Dodo',
        	'tel_no' => 456123789,
        	'email' => 'dododddd@hotmail.com',
        	'password' => Hash::make(123456789),
        	'flat_no' => 24,
        	'payment_type' => 'owner',
            'is_deleted' => false,
        	'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
			'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('users')->insert([
            'id' => 2,
            'apartment_id' => 2,
            'role_id' => 1,
            'fullname' => 'dodolita',
            'tel_no' => 123456789,
            'email' => 'dododdd@hotmail.com',
            'password' => Hash::make(123456789),
            'flat_no' => 24,
            'payment_type' => 'rent',
            'is_deleted' => false,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
    }
}
