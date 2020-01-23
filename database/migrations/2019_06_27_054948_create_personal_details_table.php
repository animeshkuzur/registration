<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonalDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personal_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('father_name');
            $table->string('mother_name');
            $table->date('dob');
            $table->string('alternate_email')->unique();
            $table->string('education_qualification');
            $table->string('phone')->unique();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('nationality_id');
            $table->unsignedBigInteger('gender_id');
            $table->unsignedBigInteger('marital_status_id');
            $table->unsignedBigInteger('community_id');
            $table->unsignedBigInteger('religion_id');
            $table->unsignedBigInteger('occupation_id');
            $table->timestamps();
        });
        Schema::table('personal_details',function($table){
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('nationality_id')->references('id')->on('nationalities');
            $table->foreign('gender_id')->references('id')->on('genders');
            $table->foreign('marital_status_id')->references('id')->on('marital_statuses');
            $table->foreign('community_id')->references('id')->on('communities');
            $table->foreign('religion_id')->references('id')->on('religions');
            $table->foreign('occupation_id')->references('id')->on('occupations');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('personal_details');
    }
}
