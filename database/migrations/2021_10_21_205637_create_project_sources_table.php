<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectSourcesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_sources', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->integer('user_id')->unsigned()->nullable();
            $table->longText('source');
            $table->uuid('project_id');
            $table->timestamps();
            $table->foreign('project_id')->references('id')->on('projects')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('project_sources');
    }
}
