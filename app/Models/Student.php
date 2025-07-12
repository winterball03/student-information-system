<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    // The table associated with the model
    protected $table = 'students';

    // The attributes that are mass assignable
    protected $fillable = [
        'studentID',
        'name',
        'phoneNumber',
        'email'
    ];

    // The primary key associated with the table
    protected $primaryKey = 'studentID';

    // Indicates if the model should be timestamped.
    public $timestamps = true;

    // Define the relationship with the Course model
    public function courses()
    {
        return $this->belongsToMany(Course::class, 'student_course', 'studentID', 'courseID')
                    ->withPivot('grades', 'attendance');
    }
}

// A service class to handle business logic
namespace App\Services;

use App\Models\Student;

class StudentService
{
    public function getAttendance(Student $student): int
    {
        return $student->attendance;
    }

    public function getGrades(Student $student): string
    {
        return $student->grades;
    }

    public function getViewData(Student $student): array
    {
        return [
            'name' => $student->name,
            'studentID' => $student->studentID,
            'phoneNumber' => $student->phoneNumber,
            'email' => $student->email,
        ];
    }
}
