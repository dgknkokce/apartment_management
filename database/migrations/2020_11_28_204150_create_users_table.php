<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->foreignId('apartment_id')->constrained()->onDelete('restrict');
            $table->foreignId('role_id')->constrained()->onDelete('restrict');
            $table->string('fullname');
            $table->bigInteger('tel_no');
            $table->string('email')->unique();
            $table->string('password');
            $table->bigInteger('flat_no');
            $table->string('payment_type');
            $table->timestamps();
        });
        Artisan::call('db:seed', [
            '--class' => UserSeeder::class
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
