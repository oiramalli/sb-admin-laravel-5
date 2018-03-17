<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionFlowsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('question_flows', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('order');
            $table->unsignedInteger('current_question');
            $table->unsignedInteger('next_question');
            $table->unsignedInteger('form');
            $table->unsignedInteger('answer');
            $table->timestamps();
            $table->foreign('current_question')->references('id')->on('questions');
            $table->foreign('next_question')->references('id')->on('questions');
            $table->foreign('form')->references('id')->on('forms');
            $table->foreign('answer')->references('id')->on('answers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('question_flows');
    }
}
