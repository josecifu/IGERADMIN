<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssignPeriodGradesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assign_period_grades', function (Blueprint $table) {
            $table->Increments('id');
            $table->unsignedInteger('grade_level_id'); 
            $table->foreign('grade_level_id')->references('id')->on('assign_level_grades');
            $table->unsignedInteger('Period_id'); 
            $table->foreign('Period_id')->references('id')->on('periods');
            $table->string('Classroom_id')->nullable(); 
            $table->string('Seccion');
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
        Schema::dropIfExists('assign_period_grades');
    }
}
