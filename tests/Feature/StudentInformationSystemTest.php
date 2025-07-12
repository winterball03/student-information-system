<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Administrator;
use App\Models\Student;
use App\Models\Course;
use App\Models\Attendance;
use App\Models\Grades;
use App\Models\StudentInformationSystem;
use App\Services\StudentService;
use Illuminate\Foundation\Testing\RefreshDatabase;

class StudentInformationSystemTest extends TestCase
{
    use RefreshDatabase;

    protected $service;

    protected function setUp(): void
    {
        parent::setUp();
        $this->service = new StudentInformationSystem();
    }

    public function test_it_adds_information()
    {
        $data = [
            'studentID' => '2300669',
            'name' => 'John Doe',
            'phoneNumber' => '1234567890',
            'email' => 'john@example.com',
            // Include additional fields if needed
        ];

        $result = $this->service->addInformation($data);

        $this->assertTrue($result);
        $this->assertDatabaseHas('students', ['studentID' => '2300669']);
    }

    public function test_it_updates_information()
    {
        $student = Student::factory()->create([
            'studentID' => 'S12345',
            'name' => 'John Doe'
        ]);

        $data = ['name' => 'Jane Doe'];
        $result = $this->service->updateInformation($student->studentID, $data);

        // Check if the method returns true
        $this->assertTrue($result);

        // Check if the database reflects the changes
        $this->assertDatabaseHas('students', ['studentID' => 'S12345', 'name' => 'Jane Doe']);
    }

    public function test_it_deletes_information()
    {
        $student = Student::factory()->create([
            'studentID' => 'S12345',
        ]);

        $result = $this->service->deleteInformation($student->studentID);

        // Check if the method returns true
        $this->assertTrue($result);

        // Check if the student is deleted from the database
        $this->assertDatabaseMissing('students', ['studentID' => 'S12345']);
    }
}