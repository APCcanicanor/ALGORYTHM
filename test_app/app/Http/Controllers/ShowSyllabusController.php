<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Syllabus;
use App\Models\ForApproval;

class ShowSyllabusController extends Controller
{
    // Show all syllabi
    public function show()
    {
        $data = Syllabus::all();
        return view('YourWorks', compact('data'));
    }

    // Show a specific syllabus
    public function details($id)
    {
        $data = Syllabus::findOrFail($id);
        return view('syllabus.details', compact('data'));
    }

    // Show the form for editing the specified syllabus
    public function edit($id)
    {
        $data = Syllabus::findOrFail($id);
        return view('syllabus.edit', compact('data'));
    }

    // Update the specified syllabus
    public function update(Request $request, $id)
    {
        $request->validate([
            'courseTitle' => 'required',
            'instructor' => 'required',
            'courseDescription' => 'required',
            'courseOutline' => 'required',
        ]);

        $data = Syllabus::findOrFail($id);
        $data->update($request->all());

        return redirect()->route('YourWorks')->with('success', 'Syllabus updated successfully!');
    }

    // Remove the specified syllabus from storage.
    public function destroy($id)
    {
        $data = Syllabus::findOrFail($id);
        $data->delete();

        return redirect()->route('YourWorks')->with('success', 'Syllabus deleted successfully!');
    }
    public function sendForApproval($id)
    {
        // Retrieve the specific syllabus data to be sent for approval
        $syllabus = Syllabus::findOrFail($id);

        // Create a new record in the 'for_approval' table
        ForApproval::create($syllabus->toArray());

        // Optionally, delete the data from the 'syllabi' table
        $syllabus->delete();

        // Redirect back with success message
        return redirect()->route('YourWorks')->with('success', 'Syllabus sent for approval successfully!');
    }




}
