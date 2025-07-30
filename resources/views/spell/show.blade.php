@extends('layouts.master')
@section('title', 'Zauberbeschreibung')
@section('content')
<div class="container bg-dark p-4 bg-opacity-75">
<!-- Auf dieser Seite zeigen wir einen bestehenden Zauberspruch (Read aus CRUD) :) -->
  @auth
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
  <div class="card p-0 border-secondary border-5 blau">
    <div class="card-header h2">
      <span class="me-2">{{ $magicTypes[$spell->school_id] ?? '' }}</span>
      <b>{{ $spell->name }}</b>
      <!-- Das habe ich einfach vorsichtshalber für zukünftige Projekte behalten. -->
      <span class="float-end h5">
        geschrieben am: <i>"{{ $spell->created_at ? $spell->created_at->format('d.m.Y H:i') : 'unbekannt' }}"</i>
        @if($spell->updated_at > $spell->created_at) 
          <b> | </b>
          geändert am: <i>"{{ $spell->updated_at->format('d.m.Y H:i') }}"
        @endif 
        <!--  -->
      </span>
    </div>
    <div class="card-body">
      <p>{!! nl2br($spell->description) !!}</p>
      <a href="{{url('spell')}}" class="btn btn-primary mt-2 my-2 float-end">
        <i class="fa-solid fa-circle-left fs-4"></i>
        zurück
      </a>
    </div>
  </div>
  @else
    <div class="alert alert-warning">
      Nur registrierte Benutzer können diesen Bereich sehen. Bitte <a href="{{ route('login') }}" class="">anmelden</a> oder <a class="" href="{{ route('bewerbung.create') }}"> bewerben</a> Sie sich  .
    </div>
  @endauth
</div>
@endsection
