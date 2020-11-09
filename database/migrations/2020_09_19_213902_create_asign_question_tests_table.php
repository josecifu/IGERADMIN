<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAsignQuestionTestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assign_question_tests', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('Teacher_id'); 
            $table->foreign('Teacher_id')->references('id')->on('asign_teacher_courses');
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
        Schema::dropIfExists('assign_question_tests');
    }
}
