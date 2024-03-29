<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ForApproval extends Model
{
    use HasFactory;

    protected $table = 'for_approval'; // Specify the table name

    protected $fillable = ['courseTitle', 'instructor', 'courseDescription', 'courseOutline', 'status', 'user_id'];

    /**
     * Define the relationship with the User model.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
