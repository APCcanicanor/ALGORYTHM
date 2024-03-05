<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Syllabus;
use App\Models\ForApproval;

class ShowSyllabusController extends Controller
{
    // Show all syllabi associated with the authenticated user
    public function show()
    {
        $data = Syllabus::where('user_id', auth()->id())->get();
        return view('YourWorks', compact('data'));
    }

    // Show the details of a specific syllabus associated with the authenticated user
    public function details($id)
    {
        $data = Syllabus::where('user_id', auth()->id())->findOrFail($id);
        return view('syllabus.details', compact('data'));
    }

    // Show the form for editing a specific syllabus associated with the authenticated user
    public function edit($id)
    {
        $data = Syllabus::findOrFail($id);
        return view('syllabus.edit', compact('data'));
    }

    // Update the specified syllabus associated with the authenticated user
    public function update(Request $request, $id)
{
    $request->validate([
        'courseTitle' => 'required',
        'instructor' => 'required',
        'courseDescription' => 'required',
        'courseOutline' => 'required',
    ]);

    $data = Syllabus::findOrFail($id);

    if ($request->has('action') && $request->input('action') === 'save_as_new') {
        // Create a new entry for the new version
        $newSyllabus = new Syllabus();
        $newSyllabus->courseTitle = $request->input('courseTitle');
        $newSyllabus->instructor = $request->input('instructor');
        $newSyllabus->courseDescription = $request->input('courseDescription');
        $newSyllabus->courseOutline = $request->input('courseOutline');
        $newSyllabus->status = 'pending'; // You might want to adjust this as needed
        $newSyllabus->user_id = auth()->id();
        $newSyllabus->save();
    } else {
        // Update the existing syllabus if the action is 'update'
        $data->update($request->all());
    }

    return redirect()->route('YourWorks')->with('success', 'Syllabus updated successfully!');
}



    // Delete the specified syllabus associated with the authenticated user
    public function destroy($id)
    {
        $data = Syllabus::findOrFail($id);
        $data->delete();

        return redirect()->route('YourWorks')->with('success', 'Syllabus deleted successfully!');
    }

    // Send the specified syllabus associated with the authenticated user for approval
    public function sendForApproval($id)
    {
        // Retrieve the specific syllabus data to be sent for approval
        $syllabus = Syllabus::findOrFail($id);

        // Create a new record in the 'for_approval' table
        ForApproval::create([
            'courseTitle' => $syllabus->courseTitle,
            'instructor' => $syllabus->instructor,
            'courseDescription' => $syllabus->courseDescription,
            'courseOutline' => $syllabus->courseOutline,
            'status' => 'pending', // Set the status to 'pending' when sending for approval
            'user_id' => auth()->id(), // Set the user_id to the authenticated user's id
        ]);

        // Delete the syllabus from the 'syllabus' table
        $syllabus->delete();

        // Redirect back with success message
        return redirect()->route('YourWorks')->with('success', 'Syllabus sent for approval successfully!');
    }
}
