<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ForApproval extends Model
{
    use HasFactory;

    protected $table = 'for_approval'; // Specify the table name

    protected $fillable = ['courseTitle', 'instructor', 'courseDescription', 'courseOutline'];

    // Define any relationships or additional methods here
}
