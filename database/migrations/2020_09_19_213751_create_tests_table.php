<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tests', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Title');
            $table->string('Score');
            $table->string('StartDate')->nullable();
            $table->string('EndDate')->nullable();
            $table->unsignedInteger('Activity_id'); 
            $table->foreign('Activity_id')->references('id')->on('assign_activities');
            $table->string('Order')->nullable();
            $table->string('Year')->nullable();
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
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        Schema::dropIfExists('tests');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
