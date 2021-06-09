<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->bigIncrements('num');
            $table->string('title')->nullable();
            $table->string('content')->nullable();
            $table->string('user_id')->nullable();
            $table->string('waste_Chk')->nullable();
            $table->string('progress_Chk')->nullable();
            
            $table->string('task_rating')->nullable();

            $table->string('file_Name')->nullable();
            $table->string('file_Path')->nullable();
            
            $table->timestamp('reg_Date')->nullable();
            $table->timestamp('mod_Date')->nullable();
            $table->timestamp('complete_Date')->nullable();

            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tasks');
    }
}
