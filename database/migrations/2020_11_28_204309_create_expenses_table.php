<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExpensesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('expenses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('expensetype_id')->constrained()->onDelete('restrict');
            $table->foreignId('apartment_id')->constrained()->onDelete('restrict');
            $table->bigInteger('amount');
            $table->timestamps();
        });
        Artisan::call('db:seed', [
            '--class' => ExpenseSeeder::class
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('expenses');
    }
}
