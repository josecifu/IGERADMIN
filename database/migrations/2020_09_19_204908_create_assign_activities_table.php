<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssignActivitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assign_activities', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Name');
            $table->integer('Score');
            $table->integer('Unity');
            $table->unsignedInteger('Course_id'); 
            $table->foreign('Course_id')->references('id')->on('courses');
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
        Schema::dropIfExists('assign_activities');
    }
}
