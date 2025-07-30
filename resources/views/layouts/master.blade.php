<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Reitarov Yevhen LaravelProject')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{url('/')}}/css/master.css" />
</head>
<body>
  <!-- Haupnavigation -->
  @includeIf('_partials.nav')	 
  <main role="main" class="container">
  <!-- error\sucess arrea -->
    @if( session('msg_success') )
      <div class="alert alert-success my-1">
        {!! session('msg_success') !!}
      </div>
    @endif 
    @if( $errors->any() )
      <div class="alert alert-danger my-1">
          Bitte überprüfe deine Eingaben
          <ul>
              @foreach($errors->all() as $error)
              <li>{!! $error !!}</li>
              @endforeach
          </ul>
      </div>
    @endif 
    <!-- --> 
  @yield('content') 
  </main>
<footer class="container">
  <div class="container bg-white p-1 d-flex justify-content-evenly">
    <span>Projekt Laravel 2025 von Reitarov Yevhen </span><a href="{{  url('impressum')}}">Impressum</a>
</div>
</footer>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script> -->
</body>
</html>