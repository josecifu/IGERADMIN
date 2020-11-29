<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notes', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('Student_id'); 
            $table->foreign('Student_id')->references('id')->on('assign_student_grades');
            $table->unsignedInteger('Course_id'); 
            $table->foreign('Course_id')->references('id')->on('courses');
            $table->string('Score')->nullable();
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
        Schema::dropIfExists('notes');
    }
}
