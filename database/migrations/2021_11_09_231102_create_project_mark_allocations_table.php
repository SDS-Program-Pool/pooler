<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectMarkAllocationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_mark_allocations', function (Blueprint $table) {
            $table->uuid('id');
            $table->primary('id');
            $table->uuid('project_id');
            $table->BigInteger('user_id')->unsigned()->nullable(); // Project Member
            $table->boolean('taken_by_user')->nullable();
            $table->boolean('notified')->nullable();
            $table->boolean('marked')->nullable();
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
        Schema::dropIfExists('project_mark_allocations');
    }
}
