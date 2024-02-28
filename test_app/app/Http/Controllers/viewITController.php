<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\ITDepartment;
use Illuminate\Http\Request;

class viewITController extends Controller
{
    //
    public function show()
    {
        $IT = ITDepartment::all();
        return view('view_syllabus.IT', compact('IT'));
    }

    // Show a specific syllabus
    public function details($id)
    {
        $IT = ITDepartment::findOrFail($id);
        return view('contents.view-IT', compact('IT'));
    }
}
