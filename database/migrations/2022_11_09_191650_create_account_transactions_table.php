<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('account_transactions', function (Blueprint $table) {
            $table->id();
            $table->string('tranasction_id')->unique();
            $table->string('type'); // Income or Expense
            $table->integer('user_id')->unsigned();
            $table->integer('account_id')->unsigned();
            $table->integer('donation_id')->unsigned();
            $table->integer('application_id')->unsigned()->nullable();

            $table->integer('country_id')->unsigned()->nullable();
            $table->integer('community_id')->unsigned()->nullable();
            $table->integer('province_id')->unsigned()->nullable();
            $table->integer('city_id')->unsigned()->nullable();

            $table->string('debit')->default('0');
            $table->string('credit')->default('0');
            $table->string('balance')->default('0');
            $table->string('summary')->nullable();
            $table->date('donation_date')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('account_transactions');
    }
};
