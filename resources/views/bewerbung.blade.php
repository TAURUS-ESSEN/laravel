@extends('layouts.master')
@section('title', 'Bewerbung')
@section('content')
<!-- Das ist die Seite mit dem Formular zur Antragstellung für den Zugang zur Bibliothek. Die Abfrage wird im AbfrageController mit Laravel-Validierung geprüft. Bei erfolgreicher Validierung wird diese Abfrage in der Datenbank-Tabelle „abfrage“ gespeichert und im Administrator-Dashboard angezeigt. Ebenso wird die Anzahl der so eingereichten Anträge auf dem Admin-Avatar im Frontend angezeigt. -->
  @php
$magicTypes = [
    1 => '🔥',
    2 => '💧',
    3 => '🌪',
    4 => '🪨',
    5 => '🕯️',
    6 => '💀',
];
@endphp
<div class="container bg-dark text-white p-4 bg-opacity-75">
    <div>Wenn Sie Magier sind und Zugang zu unserer Bibliothek erhalten möchten, füllen Sie bitte den Antrag aus. Die Aufnahme ist begrenzt.</div>
    <div class="fs-5 p-2 d-flex justify-content-center">
        <form action="{{ route('bewerbung.store') }}" method="POST" class="form w-50">
        @csrf

            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" id="name" name="name" value="{{ old('name') }}" class="form-control" />
                <small class="form-text text-danger">{!! $errors->first('name')  !!}</small>
                
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">E-Mail</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}" class="form-control" />
                <small class="form-text text-danger">{!! $errors->first('email') !!}</small>
            </div>

            <div class="mb-3">
                <label for="school_id" class="form-label">Meine Magickenntnisse</label>
                <select id="school_id" name="school_id" class="form-select">
                    <option value="">Bitte auswählen</option>
                    @foreach($schools as $school)
                        <option value="{{ $school->id }}" {{ old('school_id') == $school->id ? 'selected' : '' }}>
                            {{ $magicTypes[$school->id] ?? '' }}{{ $school->name }}
                        </option>
                    @endforeach
                </select>
                <small class="form-text text-danger">{!! $errors->first('school_id') !!}</small>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Über mich</label>
                <textarea id="description" name="about" class="form-control">{{ old('about') }}</textarea>
                <small class="form-text text-danger">{!! $errors->first('about') !!}</small>
            </div>

            <button type="submit" class="btn btn-warning mt-2">
                <i class="fa-solid fa-wand-magic-sparkles" style="color: #000000;"></i>
                Ich möchte Zugriff bekommen
            </button>
        </form>
    </div>

</div>
@endsection
