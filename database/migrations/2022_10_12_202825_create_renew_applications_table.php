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
        Schema::create('renew_applications', function (Blueprint $table) {
            $table->id();
            $table->integer('application_id')->unsigned()->nullable();
            $table->string('annually_fund_amount')->default(0);
            $table->text('user_signature');
            $table->boolean('declaration_confirm')->default(false);
            $table->boolean('rep_confirmed')->default(false);
            $table->date('renewal_date')->nullable();
            $table->string('status')->default('running');

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
        Schema::dropIfExists('renew_applications');
    }
};
