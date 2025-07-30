<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Abfrage;
use App\Models\School;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
public function index()
{
    if (auth()->user()->role !== 'admin') {
        abort(403);
    }

    $users = User::where('role', 'user')->get();
    $abfragen = Abfrage::latest()->get();
    $schools = School::all();
    return view('dashboard', compact('users', 'abfragen', 'schools'));
}

    public function toggleActive($id)
    {
        $user = User::findOrFail($id);

        if (auth()->user()->role !== 'admin') {
            abort(403);
        }

        $user->active = !$user->active;
        $user->save();

        return redirect()->route('dashboard')->with('status', 'Benutzerstatus geändert.');
    }
}
