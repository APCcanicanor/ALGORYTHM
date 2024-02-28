<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\ForApproval;
use Illuminate\Http\Request;

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



}
