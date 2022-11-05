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
            $table->string('application_id', 20)->unique();
            $table->integer('user_id')->unsigned();
            $table->string('avatar')->nullable();

            // Unique Information
            $table->string('passport_number', 20);
            $table->string('nie', 25);
            $table->string('native_id',40); // Can Be CNIC
            // Personal Information
            $table->string('full_name');
            $table->string('father_name');
            $table->string('surname');
            $table->enum('gender',['Male','Female']);
            $table->string('phone');
            $table->date('dob');
            $table->string('native_country');
            $table->string('native_country_address');
            //Residensial Information
            $table->integer('country_id')->unsigned()->nullable();
            $table->integer('community_id')->unsigned()->nullable();
            $table->integer('province_id')->unsigned()->nullable();
            $table->integer('city_id')->unsigned()->nullable();
            $table->string('area');
            // Relative Of Spain
            // Relative 1
            $table->string('s_relative_1_name', 50);
            $table->string('s_relative_1_relation', 50);
            $table->string('s_relative_1_phone', 50);
            $table->text('s_relative_1_address');
            // Relative 1
            $table->string('s_relative_2_name', 50);
            $table->string('s_relative_2_relation', 50);
            $table->string('s_relative_2_phone', 50);
            $table->text('s_relative_2_address');

            // Relative of Native Country
            // Relative 1
            $table->string('n_relative_1_name', 50);
            $table->string('n_relative_1_relation', 50);
            $table->string('n_relative_1_phone', 50);
            $table->text('n_relative_1_address');
            // Relative 1
            $table->string('n_relative_2_name', 50);
            $table->string('n_relative_2_relation', 50);
            $table->string('n_relative_2_phone', 50);
            $table->text('n_relative_2_address');

            // Representative Information
            $table->string('rep_name', 50);
            $table->string('rep_surname', 50);
            $table->string('rep_passport_no', 50);
            $table->string('rep_phone', 20);
            $table->text('rep_address');
            $table->boolean('rep_confirmed')->default(true);

            //Supplementary Information
            $table->string('buried_location');
            $table->boolean('registered_relatives')->default(false);
            $table->string('registered_relative_passport_no', 20)->nullable();
            $table->string('annually_fund_amount')->default(0);
            $table->text('user_signature');
            $table->boolean('declaration_confirm')->default(false);
            $table->string('status')->default('PENDING');

            $table->integer('receiver_id')->unsigned()->nullable();
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
