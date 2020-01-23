<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserExamCentresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_exam_centres', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('exam_centre_id');
            $table->integer('preference')->unsigned();
            $table->timestamps();
        });
        Schema::table('user_exam_centres',function($table){
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('exam_centre_id')->references('id')->on('exam_centres');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_exam_centres');
    }
}
