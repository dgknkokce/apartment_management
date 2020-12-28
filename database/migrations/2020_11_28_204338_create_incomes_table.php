<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIncomesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('incomes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('incometype_id')->constrained()->onDelete('restrict');
            $table->foreignId('apartment_id')->constrained()->onDelete('restrict');
            $table->bigInteger('amount');
            $table->timestamps();
        });
        Artisan::call('db:seed', [
            '--class' => IncomeSeeder::class
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('incomes');
    }
}
