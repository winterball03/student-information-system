<?php

namespace App\Models;

use App\Models\Student;
use App\Models\Administrator;
use App\Models\Course;
use App\Models\Attendance;
use App\Models\Grades;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;


class StudentInformationSystem
{
    public function addInformation(array $data): bool
    {
        return DB::transaction(function () use ($data) {
            $student = Student::create($data);

            if (!$student) {
                Log::error('Failed to add student information', ['data' => $data]);
            }

            return $student ? true : false;
        });
    }

    public function updateInformation(string $studentID, array $data): bool
    {
        $student = Student::find($studentID);
        Log::info('Student found:', ['student' => $student]);

        if (!$student) {
            Log::error("Student with ID $studentID not found");
            return false;
        }

        $updated = $student->update($data);
        Log::info('Update result:', ['updated' => $updated]);

        if (!$updated) {
            Log::error("Failed to update student with ID $studentID", ['data' => $data]);
        }

        return $updated;
    }

    public function deleteInformation(string $studentID): bool
    {
        $student = Student::find($studentID);
        Log::info('Student found:', ['student' => $student]);

        if (!$student) {
            Log::error("Student with ID $studentID not found");
            return false;
        }

        $deleted = $student->delete();
        Log::info('Delete result:', ['deleted' => $deleted]);

        if (!$deleted) {
            Log::error("Failed to delete student with ID $studentID");
        }

        return $deleted;
    }
}