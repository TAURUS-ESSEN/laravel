@extends('layouts.master')
@section('title', 'Zauber bearbeiten')
@section('content')
<div class="container bg-dark p-4 bg-opacity-75">
<!-- Auf dieser Seite bearbeiten wir einen bestehenden Zauberspruch (Update aus CRUD) :) -->
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
  @if(auth()->user()->role === 'admin')
  <div class="card p-0 border-secondary border-5 blau">
    <div class="card-header h2">
      <i class="fa-solid fa-scroll"></i>
      Zauber<b>"{{$spell->name}}"</b> bearbeiten
    </div>
    <div class="card-body bg"> 
      <form action="{{url('spell', $spell->slug)}}" method="post">
        @csrf 
        @method('PUT')  
        <div class="form-group">
          <label for="name">Name</label>
          <input type="text" id="name" name="name1" value="{{ old('name1') ?? $spell->name }}" class="form-control {{ $errors->has('name1') ? 'border-danger' : ''}}" />
          <small class="form-text text-danger">{!! $errors->first('name1') !!}</small>
        </div>
        <div class="form-group">
          <label for="price">Preis (in Mana Punkten 0-100)</label>
          <input type="text" id="price" name="price1" value="{{ old('price1') ?? $spell->price }}" class="form-control {{ $errors->has('price1') ? 'border-danger' : ''}}" />
          <small class="form-text text-danger">{!! $errors->first('price1') !!}</small>
        </div>
        <div class="form-group">
          <label for="school_id">Magicschule:</label>
          <select name="school_id" id="school_id" required class="form-control {{ $errors->has('school_id') ? 'border-danger' : '' }}">
            <option option value="">Bitte Magicschule wählen</option>
            @foreach($schools as $school)
              <option value="{{ $school->id }}" 
                  {{ (old('school_id') ?? $spell->school_id) == $school->id ? 'selected' : '' }}>
                  {{ $magicTypes[$school->id] .'' ?? '' }} {{ $school->name }}
              </option>
            @endforeach
          </select>
          <small class="form-text text-danger">{!! $errors->first('school_id') !!}</small>
        </div>
        <div class="form-group">
          <label for="desc">Beschreibung</label>
          <textarea id="desc" name="description1" class="form-control {{ $errors->has('description1') ? 'border-danger' : ''}}">{{ old('description1') ?? $spell->description }}</textarea>
          <small class="form-text text-danger">{!! $errors->first('description1') !!}</small>
        </div>
        <button type="submit" class="btn btn-warning mt-2">
          <i class="fa-solid fa-wand-magic-sparkles" style="color: #000000;"></i>
          Zauber bearbeiten
        </button>
      </form>
      <a href="{{url('spell')}}" class="btn btn-primary mt-2 float-end">
      <i class="fa-solid fa-circle-left"></i>
        zurück
      </a>
    </div> 
  </div> 
@endif
@else
  <div class="alert alert-warning">
    Nur registrierte Benutzer können diesen Bereich sehen. Bitte <a href="{{ route('login') }}" class="">anmelden</a> oder <a class="" href="{{ route('bewerbung.create') }}"> bewerben</a> Sie sich  .
  </div>
@endauth
</div>
@endsection



