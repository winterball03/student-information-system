<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Administrator extends Model
{
    public function addStudent(): string
    {
        return $this->addStudent;
    }

    public function updateStudent(): string
    {
        return $this->updateStudent;
    }

    public function deleteStudent(): string
    {
        return $this->deleteStudent;
    }
}
