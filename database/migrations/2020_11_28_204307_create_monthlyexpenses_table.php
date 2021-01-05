<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMonthlyexpensesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('monthlyexpenses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('apartment_id')->constrained()->onDelete('restrict');
            $table->bigInteger('totalexpense');
            $table->tinyInteger('date');
            $table->unique(["apartment_id","date"],'expense_check_unique');
            $table->timestamps();
        });
        Artisan::call('db:seed', [
            '--class' => MonthlyexpenseSeeder::class
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('monthlyexpenses');
    }
}
