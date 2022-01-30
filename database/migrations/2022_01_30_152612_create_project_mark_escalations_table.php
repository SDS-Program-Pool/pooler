<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectMarkEscalationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_mark_escalations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignId('project_id');
            $table->boolean('resolved')->nullable(); //unsure if this field will be used
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
        Schema::dropIfExists('project_mark_escalations');
    }
}
