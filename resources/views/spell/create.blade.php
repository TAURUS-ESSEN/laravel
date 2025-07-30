
@extends('layouts.master')
@section('title', 'Neuen Zauber erstellen')
@section('content')
<div class="container bg-dark p-4 bg-opacity-75">
<!-- Auf dieser Seite erstellen wir einen neuen Zauberspruch (Create aus CRUD) :) -->
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
<!-- Zugriff nur für Admin role -->
@if(auth()->user()->role === 'admin')
	<div class="card p-0 border-secondary border-5">
		<div class="card-header h2">
			<i class="fa-solid fa-scroll"></i>
			Neuen Zauber anlegen
		</div>
		<div class="card-body bg"> 
			<form action="{{url('spell')}}" method="post"> 
			@csrf 
				<div class="form-group">
					<label for="name">Name</label>
					<input type="text" id="name" name="name1" value="{{ old('name1') }}" 
					class="form-control {{ $errors->has('name1') ? 'border-danger' : ''}}" />
					<small class="form-text text-danger">{!! $errors->first('name1') !!}</small>
				</div>
				<div class="d-flex ">
					<div class="form-group">
						<label for="school_id">Magicschule:</label>
						<select name="school_id" id="school_id"  class="form-select {{ $errors->has('school_id') ? 'border-danger' : '' }}" required>
							<option value="">Bitte wählen</option>
							@foreach($schools as $school)
								<option value="{{ $school->id }}">{{ $magicTypes[$school->id] .'' ?? '' }} {{ $school->name }}</option>
							@endforeach
						</select>
					</div>
					<div class="form-group mx-3">
						<label for="price">Preis (in Mana Punkten 0-100)</label>
						<input type="text" id="price" name="price1" value="{{ old('price1') }}" 
						class="form-control {{ $errors->has('price1') ? 'border-danger' : ''}}" />
						<small class="form-text text-danger">{!! $errors->first('price1') !!}</small>
					</div>
				</div>
				<div class="form-group">
					<label for="desc">Beschreibung</label>
					<textarea id="desc" name="description1" 
				class="form-control {{ $errors->has('description1') ? 'border-danger' : ''}}">{{ old('description1') }}</textarea>
					<small class="form-text text-danger">{!! $errors->first('description1') !!}</small>
				</div>
				<button type="submit" class="btn btn-success mt-2">
					<i class="fa-solid fa-circle-plus  "></i>
					neuen Zauber anlegen
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



