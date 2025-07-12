<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentCoursePivotTable extends Migration
{
    public function up()
    {
        Schema::create('student_course', function (Blueprint $table) {
            $table->string('studentID');
            $table->string('courseID');
            $table->string('grades')->nullable();
            $table->string('attendance')->nullable();
            $table->timestamps();

            $table->foreign('studentID')->references('studentID')->on('students')->onDelete('cascade');
            $table->foreign('courseID')->references('courseID')->on('courses')->onDelete('cascade');
            $table->primary(['studentID', 'courseID']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('student_course');
    }
}
