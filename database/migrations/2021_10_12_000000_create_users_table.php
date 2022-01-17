<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('fname');
            $table->string('lname');
            $table->string('phone');
            $table->date('hire_date');
            $table->double('salary');
            $table->double('commission_pct');
            
            // $table->unsignedInteger('manager_id');
            // $table->unsignedInteger('department_id');
            // $table->unsignedInteger('job_id');

            
            $table->string('email')->unique();
            $table->string('password');
      

            $table->foreignId('manager_id')->references('id')->on('users');

            $table->foreignId('department_id')->references('id')->on('departments');
            
            $table->foreignId('job_id')->references('id')->on('jobs');

            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
