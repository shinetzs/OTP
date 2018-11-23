<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArduinoUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('arduino_user', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('arduino_id');
            $table->unsignedInteger('user_id');
            $table->timestamps();
            $table->string('gas');

            $table->foreign('arduino_id')->references('id')->on('arduinos');
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
        Schema::dropIfExists('arduino_user');
    }
}
