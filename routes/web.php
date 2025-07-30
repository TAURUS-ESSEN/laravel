<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SpellController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AbfrageController;
use App\Http\Controllers\SchoolController;

// Die Ressource-Route spell dient für CRUD-Operationen von Zaubersprüchen über den SpellController
Route::resource('spell', SpellController::class);

// statische Sieten Area
Route::get('/', function () {
    return view('startseite');
})->name('home');

Route::get('about', function () {
    return view('about');
});

Route::get('impressum', function () {
    return view('impressum');
});
// statische Sieten Ende


Route::get('/bewerbung', [AbfrageController::class, 'create'])->name('bewerbung.create');
Route::post('/bewerbung', [AbfrageController::class, 'store'])->name('bewerbung.store');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

// Ich habe ein Feld „active“ zur Benutzertabelle hinzugefügt und im Adminbereich die Möglichkeit geschaffen, Nutzer mit der Rolle „user“ zu deaktivieren.
Route::post('/dashboard/toggle/{user}', [DashboardController::class, 'toggleActive'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard.toggle');

// Im Dashboard können Einträge aus der Tabelle „abfrage“ gelöscht werden. Dies ist eine experimentelle Komponente für eine mögliche Erweiterung des Projekts.
Route::delete('/dashboard/abfrage/{abfrage}', [AbfrageController::class, 'destroy'])->name('dashboard.abfrage.destroy');

Route::delete('/dashboard/schools/{school}', [SchoolController::class, 'destroy'])->name('dashboard.schools.destroy');

require __DIR__.'/auth.php';
