<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMonthlyincomesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('monthlyincomes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('apartment_id')->constrained()->onDelete('restrict');
            $table->bigInteger('totalincome');
            $table->tinyInteger('date');
            $table->unique(["apartment_id","date"],'income_check_unique');
            $table->timestamps();
        });
        Artisan::call('db:seed', [
            '--class' => MonthlyincomeSeeder::class
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('monthlyincomes');
    }
}
