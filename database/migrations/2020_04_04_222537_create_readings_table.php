<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReadingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('readings', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('title',50);
            $table->longText('reading',800);
            $table->string('time');
            $table->string('range_age');

            $table->bigInteger('test_id')->unsigned();
            $table->foreign('test_id')->references('id')->on('questions');


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
        Schema::dropIfExists('readings');
    }
}
