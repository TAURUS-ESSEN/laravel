<?php

namespace App\Http\Controllers;
use App\Models\School;

use Illuminate\Http\Request;

class SchoolController extends Controller
{
    public function dashboard()
    {
        $schools = School::all();
        return view('dashboard', compact('schools'));
    }
    public function destroy(\App\Models\School $school)
    {
        $school->delete();
        return redirect()->back()->with('success', 'Schule wurde gelöscht.');
    }
}
