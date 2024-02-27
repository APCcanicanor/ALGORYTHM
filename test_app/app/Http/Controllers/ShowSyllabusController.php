<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Syllabus;

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
}
