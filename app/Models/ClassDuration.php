<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassDuration extends Model
{
    public function getClassDurationScale(): array{
        return ['1', '2', '3'];
    } 
}
