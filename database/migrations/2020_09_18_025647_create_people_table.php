<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePeopleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('people', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('Names');
            $table->string('LastNames');
            $table->string('Address')->nullable();
            $table->string('Phone')->nullable();
            $table->string('BirthDate')->nullable();
            $table->string('Gender')->nullable();
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
        Schema::dropIfExists('people');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
