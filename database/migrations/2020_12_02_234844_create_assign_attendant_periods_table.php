<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssignAttendantPeriodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assign_attendant_periods', function (Blueprint $table) {
                $table->Increments('id');
                $table->unsignedBigInteger('user_id'); 
                $table->foreign('user_id')->references('id')->on('users');
                $table->unsignedInteger('Period_id'); 
                $table->foreign('Period_id')->references('id')->on('periods');
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
        Schema::dropIfExists('assign_attendant_periods');
    }
}
