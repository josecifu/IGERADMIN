<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssignFieldsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assign_fields', function (Blueprint $table) {
            $table->Increments('id');
            $table->string('Model');
            $table->unsignedInteger('Id_Model'); 
            $table->unsignedInteger('field_id'); 
            $table->foreign('field_id')->references('id')->on('fields');
            $table->string('Value');
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
        Schema::dropIfExists('assign_fields');
    }
}
