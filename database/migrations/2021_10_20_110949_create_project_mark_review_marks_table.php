<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectMarkReviewMarksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_mark_review_marks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignId('project_mark_review_id');
            $table->foreignId('marks_id');
            $table->BigInteger('user_id')->unsigned()->nullable(); // Marker ID
            $table->BigInteger('percentage');
            $table->timestamps();
            $table->foreign('project_mark_review_id')->references('id')->on('project_mark_reviews')
            ->onDelete('cascade');
            $table->foreign('marks_id')->references('id')->on('project_marks')
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
        Schema::dropIfExists('project_mark_review_marks');
    }
}
