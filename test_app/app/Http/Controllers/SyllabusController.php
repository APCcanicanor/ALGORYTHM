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
                'courseOutline' => $request->input('courseOutline')
            ]);

            // Redirect to both "forApproval" and "YourWorks" routes
            return redirect()->route('forApproval')->with('success', 'Syllabus created successfully.')
                             ->route('YourWorks')->with('success', 'Syllabus created successfully.');
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Failed to create syllabus. Please try again.'], 500);
        }
    }
}
