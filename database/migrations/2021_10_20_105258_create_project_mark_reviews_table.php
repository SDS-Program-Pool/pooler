<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectMarkReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_mark_reviews', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignId('project_id');
            $table->BigInteger('user_id')->unsigned()->nullable(); // Marker ID
            $table->boolean('agree_with_marking');
            $table->string('confidence');
            $table->timestamps();
            $table->foreign('project_id')->references('id')->on('projects')
            ->onDelete('cascade');
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
        Schema::dropIfExists('project_mark_reviews');
    }
}
