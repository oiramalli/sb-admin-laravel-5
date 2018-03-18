<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientAnswersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('client_answers', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('client');
            $table->unsignedInteger('operator');
            $table->unsignedInteger('chosen_answer');
            $table->unsignedInteger('question_flow');
            $table->unsignedInteger('question');
            $table->string('description',350);
            $table->timestamps();
            $table->foreign('client')->references('id')->on('users');
            $table->foreign('operator')->references('id')->on('users');
            $table->foreign('question_flow')->references('id')->on('question_flows');
            $table->foreign('chosen_answer')->references('answer')->on('question_flows');
            $table->foreign('question')->references('current_question')->on('question_flows');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('client_answers');
    }
}
