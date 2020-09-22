<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssignMenuRolsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assign_menu_rols', function (Blueprint $table) {
            $table->Increments('id');
            $table->unsignedInteger('rol_id'); 
            $table->foreign('rol_id')->references('id')->on('rols');
            $table->unsignedInteger('menu_id'); 
            $table->foreign('menu_id')->references('id')->on('menus');
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
        Schema::dropIfExists('assign_menu_rols');
    }
}
