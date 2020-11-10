<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Title');
            $table->string('Content');
            $table->string('Score');
            $table->string('Type');
            $table->string('Answers')->nullable();
            $table->string('CorrectAnswers')->nullable();
            $table->unsignedInteger('Test_id'); 
            $table->foreign('Test_id')->references('id')->on('tests');
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
        Schema::dropIfExists('questions');
    }
}
