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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('full_name')->nullable();
            $table->string('username')->unique(); 
            $table->string('phone')->nullable();
            $table->string('email')->unique();
            $table->text('avatar')->nullable();
            $table->string('passport_number')->unique()->nullable(); 
            $table->timestamp('email_verified_at')->nullable();
            $table->boolean('status')->nullable()->default(false);
            $table->integer('application_status')->unsigned()->default(0);
            $table->string('password');
            $table->string('api_token', 80)->unique()->nullable()->default(null);
            $table->string('otp')->nullable();
            $table->string('device_token')->nullable();
            $table->integer('is_office_member')->default(0);
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
};
