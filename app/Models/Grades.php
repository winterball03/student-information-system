<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grades extends Model
{
    protected $table = 'grades'; // Update this to match your table name
    public function getGradeScale(): array{
        return ['A', 'B', 'C', 'Fail'];
    } 
}
