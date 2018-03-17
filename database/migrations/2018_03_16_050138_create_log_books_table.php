<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLogBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('log_books', function (Blueprint $table) {
            $table->increments('id');
            $table->dateTime('date_time');
            $table->unsignedInteger('user');
            $table->unsignedInteger('action_type');
            $table->timestamps();
            $table->foreign('user')->references('id')->on('users');
            $table->foreign('action_type')->references('id')->on('action_types');
            // $table->primary(['date_time', 'user', 'action_type']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('log_books');
    }
}
