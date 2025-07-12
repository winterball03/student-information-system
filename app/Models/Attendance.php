<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    protected $table = 'attendances'; // Update this to match your table name
    public function viewCourseID(CourseID $courseID):void{
        //view Course ID
    }

    public function viewCourseName(CourseName $coursename):void{
        //view Course Name
    }

    public function viewdate(Name $name):void{
        //view Class Date
    }

    public function viewClassroom(Classroom $classroom):void{
        //view Classroom
    }

    public function viewTime(ClassTime $classtime):void{
        //view Class Time
    }

    public function viewduration(ClassDuration $classduration):void{
        //view Class Duration
    }
    
    public function percentage(): float{
        return 1.0;
    }
}
