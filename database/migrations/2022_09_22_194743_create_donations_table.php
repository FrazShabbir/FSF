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
        Schema::create('donations', function (Blueprint $table) {
            $table->id();
            $table->string('donation_code')->unique();
            $table->integer('user_id')->unsigned()->nullable();
            $table->integer('application_id')->unsigned()->nullable();
            $table->string('passport_number')->nullable();

            $table->string('donor_bank_name')->nullable();
            $table->string('donor_bank_no')->nullable();
            
            $table->integer('fsf_bank_id')->nullable();
            $table->string('fsf_bank_name')->nullable();
            $table->string('fsf_bank_no')->nullable();

            $table->string('amount');
            $table->string('type'); //Made by Office / User
            
            $table->string('mode'); //Made by Office / User
            $table->string('receipt')->nullable();

            $table->string('status')->default('PENDING');
            $table->timestamps();
            $table->softDeletes();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('donations');
    }
};
