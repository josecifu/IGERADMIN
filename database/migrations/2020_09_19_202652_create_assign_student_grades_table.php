<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssignStudentGradesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assign_student_grades', function (Blueprint $table) {
            $table->Increments('id');
            $table->unsignedBigInteger('user_id'); 
            $table->foreign('user_id')->references('id')->on('users');
            $table->unsignedInteger('Grade_id'); 
            $table->foreign('Grade_id')->references('id')->on('assign_period_grades');
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
        Schema::dropIfExists('assign_student_grades');
    }
}
