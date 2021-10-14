<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTablesContraints extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tasks', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('team_id')->references('id')->on('teams');
        });

        Schema::table('teams', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users');
        });

        Schema::table('teams_members', function (Blueprint $table) {
            $table->foreign('team_id')->references('id')->on('teams');
            $table->foreign('user_id')->references('id')->on('users');
        });

        Schema::table('tasks_tags', function (Blueprint $table) {
            $table->foreign('task_id')->references('id')->on('tasks');
            $table->foreign('tag_id')->references('id')->on('tags');
        });

        Schema::table('tasks_notes', function (Blueprint $table) {
            $table->foreign('task_id')->references('id')->on('tasks');
            $table->foreign('note_id')->references('id')->on('notes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tasks', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropForeign(['team_id']);
        });

        Schema::table('teams', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
        });

        Schema::table('teams_members', function (Blueprint $table) {
            $table->dropForeign(['team_id']);
            $table->dropForeign(['user_id']);
        });

        Schema::table('tasks_tags', function (Blueprint $table) {
            $table->dropForeign(['task_id']);
            $table->dropForeign(['tag_id']);
        });

        Schema::table('tasks_notes', function (Blueprint $table) {
            $table->dropForeign(['task_id']);
            $table->dropForeign(['note_id']);
        });

        Schema::dropIfExists('teams');
        Schema::dropIfExists('teams_members');

        Schema::dropIfExists('tasks');
        Schema::dropIfExists('tasks_tags');
        Schema::dropIfExists('tasks_notes');
        
        Schema::dropIfExists('tags');
        Schema::dropIfExists('notes');

    }
}
