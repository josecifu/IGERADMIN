<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssignUserRolsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assign_user_rols', function (Blueprint $table) {
            $table->Increments('id');
            $table->unsignedInteger('Rol_id'); 
            $table->foreign('Rol_id')->references('id')->on('rols');
            $table->unsignedBigInteger('user_id'); 
            $table->foreign('user_id')->references('id')->on('users');
            $table->boolean('State');
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
        Schema::dropIfExists('assign_user_rols');
    }
}
