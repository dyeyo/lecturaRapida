<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionsTestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questions_tests', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('tests_id')->unsigned()->nullable();
            $table->bigInteger('questions_id')->unsigned()->nullable();
            $table->foreign('tests_id')->references('id')->on('tests');
            $table->foreign('questions_id')->references('id')->on('questions');
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
        Schema::dropIfExists('questions_tests');
    }
}
