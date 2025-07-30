<!-- Hier befindet sich die Hauptnavigation des Projekts. -->
@php
  $countAbfrage = \App\Models\Abfrage::count();
@endphp
<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm fs-4">
  <div class="container">
    <div class="card p-1 mx-2"> 
      <a class="navbar-brand fs-3" href="{{url('/')}}">
        <i class="fa-solid fa-hat-wizard fa-1x" style="color: #1d0d96;"></i> 
        <span class="text-primary">HexenBibliothek</span>
      </a>
    </div>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
          <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse " id="navbarSupportedContent">
			<ul class="navbar-nav me-auto "> 
				<li class="nav-item nav-name">
          <a class="nav-link  {{ Request::is('/') ? 'bg-primary text-light' : '' }} " href="{{url('/')}}">Home</a>
        </li>
        <li class="nav-item nav-name">
          <a class="nav-link {{ Request::is('spell*') ? 'bg-primary text-light' : '' }}" href="{{url('spell')}}">Zaubersprüche</a>  
        </li>
        <li class="nav-item nav-name">
          <a class="nav-link {{ Request::is('bewerbung') ? 'bg-primary text-light' : '' }}" href="{{ route('bewerbung.create') }}">Bewerbung</a>  
        </li>
        <li class="nav-item nav-name">
          <a class="nav-link {{ Request::is('about') ? 'bg-primary text-light' : '' }}" href="{{url('about')}}">Über projekt</a>  
        </li>
			</ul>
      <ul class="navbar-nav ms-auto"> 
        @auth
        <div class="container clearfix">
          <div class="px-2 d-flex">
            <b>
              <!-- Der Zugriff auf das Dashboard ist nur für Administratoren erlaubt. -->
               @if(auth()->user()->role === 'admin')
                <a href="{{ url('dashboard') }}" class="nav-link" title="Zum Daschboard">
                  {{ auth()->user()->name }}
                </a>
              @else  
              <span> {{ auth()->user()->name }}</span>
              @endif
              <!-- <i class="fa-solid fa-user-check text-success fs-2"></i> -->
            </b>
              <div class="{{ auth()->user()->role === 'admin' ? 'zauber': 'hexer' }} mx-2">
                @if(auth()->user()->role === 'admin')
                  <span class="abfragen"><sup>{{$countAbfrage}}</sup> </span>
                @endif
                </div>
            <form method="POST" action="{{ route('logout') }}" class=" me-2">
            @csrf
            <button type="submit" class="btn btn-primary btn-sm text-light" title="Logout">
              <i class="fa-solid fa-power-off "></i>
            </button>
            </form>
          </div>
        </div>
        @endauth
      </ul>
      <ul class="navbar-nav ms-auto"> 
	    @if (Route::has('login'))
        @auth
				<!-- <li class="nav-item">
          <a href="{{ url('dashboard') }}" class="nav-link">Dashboard</a>
        </li> -->
        @else
				<li class="nav-item">
						<a href="{{ route('login') }}" class="nav-link">Log in</a>
				</li>
        @endauth
      @endif
    </ul>
    </div>
  </div>
</nav>