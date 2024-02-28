<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ITDepartment extends Model
{
    use HasFactory;

    protected $table = 'it_departments'; // Specify the table name

    protected $fillable = ['courseTitle', 'instructor', 'courseDescription', 'courseOutline'];

    // Define any relationships or additional methods here
}
