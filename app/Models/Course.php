<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    // The table associated with the model
    protected $table = 'courses';
    protected $primaryKey = 'courseID';
    public $incrementing = false; // Ensure it doesn't assume auto-incrementing
    protected $keyType = 'string'; // If your primary key is a string

    // The attributes that are mass assignable
    protected $fillable = [
        'courseID',
        'courseName',
        'courseClassroom',  // Add this
        'courseTime',       // Add this
        'lecturerID',       // Add this
        'lecturerName'      // Add this
    ];


    // Cast the courseTime attribute to a Carbon instance
    protected $casts = [
        'courseTime' => 'datetime',
    ];

    // Define the relationship with the Student model
    public function students()
    {
        return $this->belongsToMany(Student::class, 'student_course', 'courseID', 'studentID')
                    ->withPivot('grades', 'attendance');
    }

    public function getCourseID(): string
    {
        return $this->courseID;
    }

    public function getCourseName(): string
    {
        return $this->courseName;
    }

    public function getCourseClassroom(): ?string
    {
        return $this->courseClassroom;
    }

    public function getCourseTime(): \Illuminate\Support\Carbon
    {
        return $this->courseTime;
    }

    public function getLecturerID(): string
    {
        return $this->lecturerID;
    }

    public function getLecturerName(): string
    {
        return $this->lecturerName;
    }
}

