<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job_histories', function (Blueprint $table) {
            $table->id();
            $table->date('start_date');
            $table->date('end_date');
            // $table->unsignedInteger('user_id');
            // $table->unsignedInteger('job_id');
            // $table->unsignedInteger('department_id');
           
            
            $table->foreignId('user_id')->references('id')->on('users');
            $table->foreignId('job_id')->references('id')->on('jobs');
            $table->foreignId('department_id')->references('id')->on('departments');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('job_histories');
    }
}
