<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssignFilesInformationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assign_files_informations', function (Blueprint $table) {
            $table->Increments('id');
            $table->unsignedInteger('Information_id'); 
            $table->foreign('Information_id')->references('id')->on('information');
            $table->unsignedInteger('File_id'); 
            $table->foreign('File_id')->references('id')->on('files');
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
        Schema::dropIfExists('assign_files_informations');
    }
}
