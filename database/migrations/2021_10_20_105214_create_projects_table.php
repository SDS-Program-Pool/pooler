<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->unsignedBigInteger('id')->unique();
            $table->primary('id');
            $table->longText('name');
            $table->BigInteger('user_id')->unsigned()->nullable(); // Project Owner
            $table->boolean('is_team_individual')->nullable();
            $table->boolean('is_team')->nullable();
            $table->boolean('is_team_feature_branch')->nullable();
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')
            ->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('projects');
    }
}
