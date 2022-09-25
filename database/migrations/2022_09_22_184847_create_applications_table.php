<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applications', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->unsigned();
            // Unique Information
            $table->string('passport_number', 20);
            $table->string('nie', 25);
            $table->string('native_id', 20);
            // Personal Information
            $table->string('full_name');
            $table->string('father_name');
            $table->string('surname');
            $table->string('gender');
            $table->string('phone');
            $table->string('dob');
            $table->string('native_country');
            $table->string('native_country_address');
            //Residensial Information
            $table->string('country', 30);
            $table->string('community');
            $table->string('province', 40);
            $table->string('city', 40);
            $table->string('area');
            // Relative Of Spain
            // Relative 1
            $table->string('s_relative_1_name', 30);
            $table->string('s_relative_1_relation', 30);
            $table->string('s_relative_1_phone', 30);
            $table->text('s_relative_1_address');
            // Relative 1
            $table->string('s_relative_2_name', 30);
            $table->string('s_relative_2_relation', 30);
            $table->string('s_relative_2_phone', 30);
            $table->text('s_relative_2_address');

            // Relative of Native Country
            // Relative 1
            $table->string('n_relative_1_name', 30);
            $table->string('n_relative_1_relation', 30);
            $table->string('n_relative_1_phone', 30);
            $table->text('n_relative_1_address');
            // Relative 1
            $table->string('n_relative_2_name', 30);
            $table->string('n_relative_2_relation', 30);
            $table->string('n_relative_2_phone', 30);
            $table->text('n_relative_2_address');

            // Representative Information
            $table->string('rep_name', 50);
            $table->string('rep_sername', 50);
            $table->string('rep_passport_no', 50);
            $table->string('rep_phone', 20);
            $table->string('rep_address');
            $table->boolean('rep_confirmed')->default(true);

            //Supplementary Information
            $table->string('buried_location');
            $table->string('registered_relatives', 50);
            $table->string('registered_relative_passport_no', 20);
            $table->string('annually_fund_amount');
            $table->text('user_signature');
            $table->boolean('declaration_confirm')->default(false);
            $table->string('status')->default('PENDING');

            $table->integer('receiver_id')->unsigned();
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
        Schema::dropIfExists('applications');
    }
};
