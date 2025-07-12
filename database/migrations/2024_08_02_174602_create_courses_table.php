<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoursesTable extends Migration
{
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->string('courseID')->primary();
            $table->string('courseName');
            $table->string('courseClassroom')->nullable(); 
            $table->dateTime('courseTime');
            $table->string('lecturerID');
            $table->string('lecturerName');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('courses');
    }
}
