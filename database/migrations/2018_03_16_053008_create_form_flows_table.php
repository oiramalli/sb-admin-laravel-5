<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFormFlowsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('form_flows', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('order');
            $table->unsignedInteger('current_form');
            $table->unsignedInteger('next_form');
            $table->timestamps();
            $table->foreign('current_form')->references('id')->on('forms');
            $table->foreign('next_form')->references('id')->on('forms');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('form_flows');
    }
}
