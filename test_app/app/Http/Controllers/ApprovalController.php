<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\ForApproval;
use Illuminate\Http\Request;
use App\Models\Syllabus;
use Illuminate\Support\Facades\DB; // Import the DB facade

class ApprovalController extends Controller
{

    public function show()
    {
        $approval = ForApproval::all();
        return view('forApproval', compact('approval'));
    }

    // Show a specific syllabus
    public function details($id)
    {
        $approval = ForApproval::findOrFail($id);
        return view('syllabus.sendForApproval', compact('approval'));
    }

    // Reject approval and move data to syllabi table
    public function rejectApproval($id)
    {
        // Find the data to be rejected
        $forApproval = ForApproval::findOrFail($id);

        // Create a new entry in the syllabi table with the rejected data
        Syllabus::create([
            'courseTitle' => $forApproval->courseTitle,
            'instructor' => $forApproval->instructor,
            'courseDescription' => $forApproval->courseDescription,
            'courseOutline' => $forApproval->courseOutline,
        ]);

        // Delete the rejected entry from the for_approval table
        $forApproval->delete();

        // Redirect or return a response as needed
        return redirect()->route('forApproval')->with('status', 'The approval has been rejected successfully.');

    }

    public function approveSyllabus(Request $request, $id)
    {
        $syllabus = ForApproval::findOrFail($id);

        // Validate department selection
        $request->validate([
            'department' => 'required|in:IT,Biology', // Add more departments as needed
        ]);

        // Determine the table name based on the selected department
        $department = $request->department;
        $tableName = strtolower($department) . '_departments';

        // Create a new syllabus entry in the selected department
        $newEntry = [
            'courseTitle' => $syllabus->courseTitle,
            'instructor' => $syllabus->instructor,
            'courseDescription' => $syllabus->courseDescription,
            'courseOutline' => $syllabus->courseOutline,
        ];

        // Insert the data into the respective department's table
        DB::table($tableName)->insert($newEntry);

        // Delete the approved syllabus from the approval table
        $syllabus->delete();

        // Redirect with a success message
        return redirect()->route('forApproval')->with('status', 'The syllabus has been approved and stored in the ' . $department . ' department.');
    }

}
