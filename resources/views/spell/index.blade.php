@extends('layouts.master')
@section('title', 'Liste der Zaubersprüche')
@section('content')
<div class="container bg-dark p-4 bg-opacity-75">
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
@auth
<div class="card m-1">
  <div class="card-header">
    <i class="fa-solid fa-scroll"></i>
    {{ $zahl ? 'Alle Zaubersprüche ('.$zahl.')' : 'Schreiben Sie einen Zauberspruch' }}
    {{ $zahl1 ? '🔥('.$zahl1.')' : '' }}
    {{ $zahl2 ? '💧('.$zahl2.')' : '' }}
    {{ $zahl3 ? '🌪 ('.$zahl3.')' : '' }}
    {{ $zahl4 ? '🪨('.$zahl4.')' : '' }}
    {{ $zahl5 ? '🕯️('.$zahl5.')' : '' }}
    {{ $zahl6 ? '💀('.$zahl6.')' : '' }}
  </div>
  <div class="card-body bg">
    @if($zahl > 0)
    <div class="mb-3 d-flex justify-content-between ">
      <form method="GET" action="{{ url('spell') }}">
        <select name="school_id" id="school_filter" class="form-select" onchange="this.form.submit()">
          <option value="">Alle Magicschulen</option>
          @foreach($schools as $school)
            <option value="{{ $school->id }}" {{ request('school_id') == $school->id ? 'selected' : '' }}>
              {{ $magicTypes[$school->id] ?? '' }}{{ $school->name }}
            </option>
          @endforeach
        </select>
      </form>
      <!--ADD BUTTON nur für admin role-->
      @if(auth()->user()->role === 'admin')
      <a href="{{ url('spell/create') }}" class="btn btn-primary  ">
        <i class="fa-solid fa-circle-plus"></i>
        Neuen Zauber anlegen
      </a>
      @endif
    </div>
    <ul class="list-group h4">
      <li class="d-flex p-2 bg-primary text-white  justify-content-between">
        <span>Zaubername mit Preis in Magic Punkten</span>
        <span> </span>
      </li>
      @foreach($spells as $spell) 
        <li class="list-group-item d-flex justify-content-between currentSpell">
          <span>
            <span class="me-2">{{ $magicTypes[$spell->school_id] ?? '' }}</span>
            <span class="me-2"><a href="{{ url('spell', $spell->slug) }}" class="link" title="Zauber info">{{ $spell->name }}</a> </span>
            <span class="me-2">{{ $spell->price }}
            <i class="fa-solid fa-flask" style="color: #74C0FC;"></i></span>
          </span>
          <!--SHOW BUTTON-->
          <span>
            <a href="{{ url('spell', $spell->slug) }}" class="btn btn-outline-info" title="Kurze info">
              <i class="fa-solid fa-eye m-0 h4"></i>
            </a>
            <!--EDIT BUTTON nur für admin role-->
            @if(auth()->user()->role === 'admin')
              <a href="{{ route('spell.edit', $spell->slug) }}" class="btn btn-outline-primary" title="Zauber bearbeiten">
                <i class="fa-solid fa-pen-to-square m-0 h4 me-1 text-dark"></i>
              </a>
              <!--DELETE BUTTON-->
              <form action="{{ url('spell', $spell->slug) }}" method="post" class="d-inline-block">
                @csrf 
                @method('DELETE')
                <button type="submit" class="btn btn-outline-danger" title="Zauber verbrennen"
                  onclick="return confirm('Wollen Sie den Zauber „{{$spell->name}}“ wirklich verbrennen?');">
                <!-- <i class="fa-solid fa-trash-can m-0 h4 me-1"></i> -->
                <i class="fa-solid fa-fire m-0 h4 me-1 " style="color: #fd6412;"></i>
                </button>
              </form>
            @endif
            <!--end of Admin area-->
          </span>
        </li>
      @endforeach
    </ul>

    @else 
      <p>Noch kein Zauber vorhanden</p>
    @endif
    @if(auth()->user()->role === 'admin')
    <a href="{{ url('spell/create') }}" class="btn btn-primary mt-2">
      <i class="fa-solid fa-circle-plus"></i>
      Neuen Zauber anlegen
    </a>
    @endif
  </div>
  
</div>
      <!--PAGINATIONS-->
      <div class=" ">{{ $spells->links() }}</div>
      <!--PAGINATIONS-->
@else
  <div class="alert alert-warning">
    Nur registrierte Benutzer können diesen Bereich sehen. Bitte <a href="{{ route('login') }}" class="">anmelden</a> oder <a class="" href="{{ route('bewerbung.create') }}"> bewerben</a> Sie sich  .
  </div>
@endauth
</div>
@endsection
