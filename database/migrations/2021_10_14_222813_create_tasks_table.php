<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->string('title', 50);
            $table->string('description', 150)->nullable();
            $table->string('content');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('team_id');
            $table->dateTime('completed_at');
            $table->timestamps();
        });
    }
}
