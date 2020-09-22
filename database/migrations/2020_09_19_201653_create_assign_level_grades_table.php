<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssignLevelGradesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assign_level_grades', function (Blueprint $table) {
            $table->Increments('id');
            $table->unsignedInteger('Level_id'); 
            $table->foreign('Level_id')->references('id')->on('levels');
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
        Schema::dropIfExists('assign_level_grades');
    }
}
