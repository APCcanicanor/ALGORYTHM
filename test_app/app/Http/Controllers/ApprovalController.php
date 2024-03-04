<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\ForApproval;
use App\Models\Syllabus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ApprovalController extends Controller
{
    public function show()
    {
        $rejected = ForApproval::where('status', 'rejected')->get();
        $approved = ForApproval::where('status', 'approved')->get();
        $pending = ForApproval::where('status', 'pending')->get();

        return view('forApproval', compact('rejected', 'approved', 'pending'));
    }

    public function details($id)
    {
        $approval = ForApproval::findOrFail($id);
        return view('syllabus.sendForApproval', compact('approval'));
    }

    public function rejectApproval($id)
{
    // Find the syllabus awaiting approval
    $forApproval = ForApproval::findOrFail($id);

    // Retrieve the user associated with the rejected syllabus
    $user = $forApproval->user;

    // Check if the user exists
    if ($user) {
        // Update the status of the syllabus to 'rejected' in the for_approval table
        $forApproval->update(['status' => 'rejected']);

        // Duplicate the rejected syllabus and assign it to the specific user
        $rejectedSyllabus = new Syllabus([
            'courseTitle' => $forApproval->courseTitle,
            'instructor' => $forApproval->instructor,
            'courseDescription' => $forApproval->courseDescription,
            'courseOutline' => $forApproval->courseOutline,
            'user_id' => $user->id, // Set the user_id
            'status' => 'rejected' // Set status to 'rejected'
        ]);
        $rejectedSyllabus->save();

        // Redirect or return a response as needed
        return redirect()->route('forApproval')->with('status', 'The approval has been rejected successfully.');
    } else {
        // Handle the case where the user is not found (e.g., log an error)
        Log::error('User not found for rejected syllabus: ' . $forApproval->id);

        // Redirect or return a response as needed
        return redirect()->route('forApproval')->with('error', 'An error occurred while rejecting the approval.');
    }
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

        // Update the status to 'approved' in the for_approval table
        $syllabus->update(['status' => 'approved']);

        // Redirect with a success message
        return redirect()->route('forApproval')->with('status', 'The syllabus has been approved and stored in the ' . $department . ' department.');
    }

    public function delete($id)
    {
        $syllabus = ForApproval::findOrFail($id);

        // Delete the syllabus
        $syllabus->delete();

        // Redirect with a success message
        return redirect()->route('forApproval')->with('status', 'The syllabus has been deleted successfully.');
    }
}
