<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('mode');
            $table->string('registration_number')->unique();
            $table->string('vpa')->nullable();
            $table->boolean('status')->default(0);
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('amount');
            $table->timestamps();
        });

        Schema::table('payments',function($table){
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payments');
    }
}
