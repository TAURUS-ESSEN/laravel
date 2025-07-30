@extends('layouts.master')
@section('title', 'Über projekt')
@section('content')
<div class="container bg-dark text-white p-4 bg-opacity-75">
<!-- Statische Seite mit einer kurzen Beschreibung der Projektmöglichkeiten :) -->
<div class="card text-dark fs-6 bg" >
	<div class="p-2"><h2>Wie funktioniert hier alles?</h2></div>
	<div class="d-flex  p-2 flex-wrap justify-content-evenly ">
	<div class="card col-5 p-1 grayscale ">
			<div class="bg-secondary text-white p-2">CRUD</div>
			<img src="{{ asset('images/crud.webp') }}" alt="" class="img-fluid" >
		</div>
		<div class="card col-5 p-1 grayscale">
			<div class="bg-secondary text-white p-2">Ein Bereich, der nur für die eingeloggten User sichtbar ist</div>
			<img src="{{ asset('images/zugriff.webp') }}" alt="" class="img-fluid " >
		</div>
	</div>
	<hr>
	<div class="d-flex p-2 flex-wrap justify-content-evenly my-3">
	<div class="card col-5 p-1 grayscale ">
			<div class="bg-secondary text-white p-2">Schutz vor direktem Linkzugriff auf Bearbeitungs für nicht angemeldete Benutzer http://127.0.0.1:8000/spell/create</div>
			<img src="{{ asset('images/zugriff2.webp') }}" alt="" class="img-fluid" >
		</div>
		<div class="card col-5 p-1 grayscale">
			<div class="bg-secondary text-white p-2">Fehlende Links prüfen http://127.0.0.1:8000/blabla</div>
			<img src="{{ asset('images/fehlendeLinke.webp') }}" alt="" class="img-fluid" >
		</div>
	</div>
	<hr>
	
	<div class="d-flex p-2 flex-wrap justify-content-evenly ">
		<div class="card col-10 p-1 grayscale" >
			<div class="bg-secondary text-white p-2" >Die Tabellen schools, spells und abfrage stehen miteinander in Beziehung. Die Tabellen spells und abfrage enthalten jeweils das Feld school_id als Fremdschlüssel, der auf die Tabelle schools verweist.</div>
			<img src="{{ asset('images/magicschule.webp') }}" alt="" class="img-fluid ">
		</div>
	</div>

	<hr>

	<div class="d-flex p-2 flex-wrap justify-content-evenly ">
		<div class="card col-4 p-1 grayscale" >
			<div class="bg-secondary text-white p-2" style="height: 200px;">Beim Ausführen des Seeders werden zwei Benutzer mit der Zugriffsrolle ‚user‘ angelegt (diese dürfen nur geschützte Bereiche einsehen), einer davon ist zunächst inaktiv. Der Administrator kann im Dashboard Benutzer aktivieren oder deaktivieren.</div>
			<img src="{{ asset('images/hexerliste.webp') }}" alt="" class="img-fluid ">
		</div>
		<div class="card   col-3 p-1 grayscale">
			<div class="bg-secondary text-white p-2" style="height: 200px;">Das Programm sieht vor, dass sich Benutzer (Magier) nicht selbst registrieren können, sondern nur eine Anfrage stellen dürfen. Die Anzahl der eingegangenen Anfragen wird neben dem Avatar des Administrators angezeigt.  </div>
			<img src="{{ asset('images/abfrage-сount.webp') }}" alt="" class="img-fluid" >
		</div>

		<div class="card   col-4 p-1 grayscale">
			<div class="bg-secondary text-white p-2" style="height: 200px;">Die abgeschickten und validierten Anfragen sind im Dashboard des Administratorkontos mit einer Kurzbeschreibung sichtbar. Es besteht die Möglichkeit, eine Anfrage abzulehnen (aus der Datenbank zu löschen) oder – in einer späteren Projektphase – zu genehmigen (in diesem Projekt noch nicht umgesetzt).</div>
			<img src="{{ asset('images/abfrage-daschboard.webp') }}" alt="" class="img-fluid ">
		</div>

	</div>
		<hr>
		
		<div class="d-flex  p-2 flex-wrap justify-content-evenly ">
		<div class="card   col-4 p-1 grayscale">
			<div class="bg-secondary text-white p-2"  >Slug – benutzerfreundliche und suchmaschinenfreundliche Adresse  </div>
			<img src="{{ asset('images/slug.webp') }}" alt="" class="img-fluid" style="height: 200px;">
		</div>


			<div class="card col-3 p-1 grayscale">
				<div class="bg-secondary text-white p-2">Die Migrationsdateien für die Tabellen sowie die Seed-Dateien mit manuell vorbereiteten Daten sind fertig. Außerdem wurde eine Factory zur automatischen Generierung von Zaubersprüchen erstellt. <code class="text-white bg-primary">php artisan migrate:fresh --seed</code></div> 
				<img src="{{ asset('images/migrations.webp') }}" alt="" class="img-fluid ">
			</div>
			<div class="card col-4  p-1 grayscale">
				<div class="bg-secondary text-white p-2">Formular mit Eingabe-Kontrollen. Die Validierungsfehler wurden in die deutsche Sprache übertragen  </div>
				<img src="{{ asset('images/formvalidation.webp') }}" alt="" class="img-fluid ">
			</div>
		</div>
</div>
@endsection

