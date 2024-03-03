<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Syllabus;

class SyllabusController extends Controller
{
    public function store(Request $request)
    {
        try {
            $syllabus = Syllabus::create([
                'courseTitle' => $request->input('courseTitle'),
                'instructor' => $request->input('instructor'),
                'courseDescription' => $request->input('courseDescription'),
                'courseOutline' => $request->input('courseOutline'),
                'status' => 'pending' // Set the initial status to 'pending'
            ]);

            return response()->json(['success' => true, 'message' => 'Successfully created the Syllabus']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Failed to create syllabus. Please try again.'], 500);
        }
    }
}
