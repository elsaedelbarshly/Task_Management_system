<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImagesToTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('images_to_tasks', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('task_id');
            $table->foreign('task_id')->references('id')->on('tasks');

            $table->unsignedBigInteger('image_id');
            $table->foreign('image_id')->references('id')->on('images');

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
        Schema::dropIfExists('images_to_tasks');
    }
}
