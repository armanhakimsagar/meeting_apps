<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionRepliesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('question_replies', function (Blueprint $table) {
            $table->increments('id');
            $table->longText('reply')->nullable();
            $table->integer('question_id');
            $table->foreign('question_id')->references('id')->on('questions');
            $table->increments('userid');
            $table->foreign('userid')->references('id')->on('registrations');
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
        Schema::dropIfExists('question_replies');
    }
}
