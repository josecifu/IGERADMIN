<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssignCourseGradesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assign_course_grades', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('Course_id'); 
            $table->foreign('Course_id')->references('id')->on('courses');
            $table->unsignedInteger('Grade_id'); 
            $table->foreign('Grade_id')->references('id')->on('grades');
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
        Schema::dropIfExists('assign_course_grades');
    }
}
