<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCheckupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('checkups', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->dateTime('checkouted_at');
            $table->float('weight', 5,2);
            $table->float('height', 5,2);
            $table->string('blood_pressure');
            $table->integer('glucose_level');
            $table->float('ldl', 5,2);
            $table->float('hdl', 5,2);
            $table->text('observation');
            $table->timestamps();
            //Foreigns
            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('checkups');
    }
}
