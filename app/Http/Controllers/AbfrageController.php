<?php

namespace App\Http\Controllers;
use App\Models\School;
use App\Models\Abfrage;
use Illuminate\Http\Request;
// Das ist der Controller des experimentellen Teils des Projekts – die Abfragestellung zur Benutzeraufnahme. Ein vollständiges CRUD ist im SpellController umgesetzt.
class AbfrageController extends Controller
{
    public function create()
    {
        $schools = School::all();
        return view('bewerbung', compact('schools'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|min:5|max:255',
            'about' => 'required|string|min:5',
            'school_id' => 'required|exists:schools,id',
            'email' => 'required|email|unique:abfrage,email',
        ]);

        Abfrage::create($validated);
        session()->flash('msg_success', 'Abfrage <b>'. $request->name .' </b> wurde gesendet. Bitte warten auf Genehmigung');
        return redirect()->route('bewerbung.create');
    }

    public function destroy(Abfrage $abfrage)
    {
        $abfrage->delete();
        return redirect()->back()->with('success', 'Abfrage gelöscht.');
    }
}

