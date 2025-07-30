<?php

namespace App\Http\Controllers;

use App\Models\Spell;
use App\Models\School;
use App\Http\Requests\StoreSpellRequest;
use App\Http\Requests\UpdateSpellRequest;
use Illuminate\Http\Request;
// Das ist der Controller meiner Hauptkomponente zur Demonstration von CRUD – der Zauberspruchliste.
class SpellController extends Controller
{
    public function index(Request $request)
    {
        $schools = School::all();
        $query = Spell::query();

        if ($request->filled('school_id')) {
            $query->where('school_id', $request->school_id);
        }

        $sp = $query->orderByDesc('school_id')->paginate(10);
        $count = $sp->count();
        // So eine Aufzählung ist etwas mühsam, aber das Refactoring, das möglich gewesen wäre, ist mir nicht klar.
        $zahl1 = Spell::where('school_id', 1)->count();
        $zahl2 = Spell::where('school_id', 2)->count();
        $zahl3 = Spell::where('school_id', 3)->count();
        $zahl4 = Spell::where('school_id', 4)->count();
        $zahl5 = Spell::where('school_id', 5)->count();
        $zahl6 = Spell::where('school_id', 6)->count();
        return view('spell.index')->with([
            'spells' => $sp,
            'zahl' => $count,
            'zahl1' => $zahl1,
            'zahl2' => $zahl2,
            'zahl3' => $zahl3,
            'zahl4' => $zahl4,
            'zahl5' => $zahl5,
            'zahl6' => $zahl6,
            'schools' => $schools,
        ]);
    }

    public function create()
    {
        $schools = School::all();  
        return view('spell.create')->with('schools', $schools);
    }

    public function store(StoreSpellRequest $request)
    {
        // Hier befindet sich die Formularvalidierung – in diesem Fall für das Hinzufügen, und weiter unten im Code – für das Aktualisieren :)
        $request->validate(
            [
            'name1' => 'required|min:2|max:255',
            'description1' => ['required', 'min:5', 'max:5000'],
            'price1' => 'required|integer|min:1|max:100',
            'school_id' => 'required|exists:schools,id',
            ]
        );
        
        $spell = new Spell([
            'name' => $request['name1'],
            'description' => $request['description1'],
            'price' => $request['price1'],  
            'school_id' => $request['school_id'],  
        ]);

        $spell->save();
        session()->flash('msg_success', 'Zauber <b>'.$spell['name'].'</b> wurde eingefügt');
        return redirect('/spell');
    }

    public function show(Spell $spell)
    {
        return view('spell.show')->with('spell', $spell);
    }

    public function edit(Spell $spell)
    {
        $schools = School::all();
        return view('spell.edit')->with([
            'spell' => $spell,
            'schools' => $schools,
        ]);
    }

    public function update(UpdateSpellRequest $request, Spell $spell)
    {
        
        $request->validate(
            [
            'name1' => 'required|min:2|max:255',
            'description1' => ['required', 'min:5', 'max:5000'],
            'price1' => 'required|numeric|min:0|max:100',
            'school_id' => 'required|exists:schools,id',
            ]
        );

        $alt = $spell->name;

        $spell->update(
            [
            'name' => $request->name1,
            'description' => $request->description1,
            'price' => $request['price1'],  
            'school_id' => $request['school_id'],  
            ]
        );

        $neu = $spell->name;

    session()->flash('msg_success', 'Zauberspruch <b>'.$alt.'</b> wurde geändert');
        return redirect('/spell');

    }

    public function destroy(Spell $spell)
    {
        $spell->delete();
        session()->flash('msg_success', 'Zauberspruch <b>'.$spell->name.'</b> wurde gelöscht');
        return redirect('/spell');
    }
}
