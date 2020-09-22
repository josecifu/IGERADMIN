<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssignRolPermsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assign_rol_perms', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('Rol_id'); 
            $table->foreign('Rol_id')->references('id')->on('rols');
            $table->unsignedInteger('perm_id'); 
            $table->foreign('perm_id')->references('id')->on('permissions');
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
        Schema::dropIfExists('assign_rol_perms');
    }
}
