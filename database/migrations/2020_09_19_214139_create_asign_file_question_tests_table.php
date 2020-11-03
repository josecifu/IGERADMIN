<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAsignFileQuestionTestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assign_file_question_tests', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('Question_id'); 
            $table->foreign('Question_id')->references('id')->on('assign_question_tests');
            $table->unsignedInteger('File_id'); 
            $table->foreign('File_id')->references('id')->on('files');
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
        Schema::dropIfExists('assign_file_question_tests');
    }
}
