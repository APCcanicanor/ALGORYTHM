<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Syllabus extends Model
{
    use HasFactory;

    protected $fillable = ['courseTitle', 'instructor', 'courseDescription', 'courseOutline', 'status', 'user_id'];
}
