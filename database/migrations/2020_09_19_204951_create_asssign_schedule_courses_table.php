<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAsssignScheduleCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assign_schedule_courses', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('Course_id'); 
            $table->foreign('Course_id')->references('id')->on('assign_course_grades');
            $table->unsignedInteger('Schedule_id'); 
            $table->foreign('Schedule_id')->references('id')->on('schedules');
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
        Schema::dropIfExists('asssign_schedule_courses');
    }
}
