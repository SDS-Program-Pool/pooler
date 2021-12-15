<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectManualReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_manual_reviews', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->BigInteger('user_id')->unsigned()->nullable(); // Requester
            $table->foreignId('project_id');
            $table->longText('comments');
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')
            ->onDelete('set null');
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
        Schema::dropIfExists('project_manual_reviews');
    }
}
