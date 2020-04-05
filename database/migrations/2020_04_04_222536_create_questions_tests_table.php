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
            $table->string('option',100);
            $table->bigInteger('questions_id')->unsigned();
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
