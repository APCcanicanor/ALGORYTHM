<?php

namespace App\Http\Controllers;

use App\Models\Biology;
use Illuminate\Http\Request;

class BiologyController extends Controller
{
    public function show()
    {
        $bio = Biology::all();
        return view('view_syllabus.biology', compact('bio'));
    }

    public function details($id)
    {
        $bio = Biology::findOrFail($id);
        return view('contents.view-biology', compact('bio')); 
    }
}
