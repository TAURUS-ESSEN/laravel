@extends('layouts.master')
@section('title', 'Startseite')
@section('content')
<div class="container bg-dark text-white p-4 bg-opacity-75">
    <div class="fs-5 p-2 ">
        <div class="d-flex gap-2">
        <div><img src="{{ asset('images/bibl.webp') }}" alt="" class="img-fluid" ></div>
            <div>
                <p> Willkommen im Katalog magischer Zauber verschiedenster Schulen – Feuer, Eis, Luft und Erde.
                Entdecken Sie uralte Formeln, mächtige Rituale und geheimes Wissen aus längst vergessenen Zeiten.
                <span class="text-primary">Im Projekt sind folgende drei Rollen vorgesehen:</span>  </p>
                <div class="container d-flex gap-2 my-2 text-dark">
                    <div class="card">
                        <div class="card-header p-1 fw-bold text-center">Gast (nicht eingeloggter Benutzer)</div>
                        <div class="card-body p-2">Kein Zugriff auf den Bereich "Zaubersprüche" und keine Berechtigung zur Datenbankbearbeitung.</div>
                    </div>
                    <div class="card">
                        <div class="card-header p-1 fw-bold text-center"> Eingeloggter Benutzer (Hexer)</div>
                        <div class="card-body p-2">Hat Zugang zum Bereich "Zaubersprüche", jedoch keine Möglichkeit, Inhalte zu bearbeiten.
                            <ul class="list-group list-group-flush ">
                                <li class = "text-danger list-group-item" >email: user@magic.com </li>
                                <li class = "text-danger list-group-item" >Passwort: password123</li>
                            </ul>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header p-1 fw-bold text-center"> Administrator (Grossmagier)</div>
                        <div class="card-body p-2">Kann neue Zauber hinzufügen, bestehende bearbeiten oder löschen.
                        Voller Zugriff auf die Datenbankfunktionen.</div>
                        <ul class="list-group list-group-flush">
                            <li class = "text-danger list-group-item" >email: magier@magic.com </li>
                            <li class = "text-danger list-group-item" >Passwort:  LaravelIstSchmerz</li>
                        </ul>
                    </div>
                </div>
                ⚠️ Warnung: Unbefugter Zugriff auf die Todesmagie kann zu Flüchen, Halluzinationen oder spontaner Verwandlung in einen Frosch führen. Betreten auf eigene Gefahr!
            </div>
        </div>
    </div>
</div>
@endsection

