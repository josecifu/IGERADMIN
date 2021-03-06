<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAsignAnswerTestStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asign_answer_test_students', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('Studen_id'); 
            $table->foreign('Studen_id')->references('id')->on('assign_student_grades');
            $table->unsignedInteger('Question_id'); 
            $table->foreign('Question_id')->references('id')->on('questions');
            $table->string('Score')->nullable();
            $table->string('Answers')->nullable();
            $table->string('State');
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
        Schema::dropIfExists('asign_answer_test_students');
    }
}
