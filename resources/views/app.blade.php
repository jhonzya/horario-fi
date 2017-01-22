<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="description" content="Herramienta para crear tus horarios de la Facultad de Ingeniería"/>
  <meta name="keywords" content="Horario Facultad Ingniería UNAM Inscripciones Software Herramienta FI">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Horario FI</title>

  <meta name="_path" content="{{ url('/') }}">
  <meta name="_token" content="{{ csrf_token() }}">
  <link rel="stylesheet" href="{{ asset('/css/vendor.css') }}" />
  <link rel="stylesheet" href="{{ asset('/css/app.css') }}" />

  <link rel="shortcut icon" href="{{ asset('/img/favicon.ico') }}" type="image/x-icon">
  <link rel="icon" href="{{ asset('/img/favicon.ico') }}" type="image/x-icon">
  
  <meta property="fb:admins" content="Jhonnie.AZ" />
  <meta property="fb:app_id" content="{{env('FACEBOOK_ID')}}"/>
  <meta property="og:url"           content="http://horario.amico.mx/" />
  <meta property="og:type"          content="website" />
  <meta property="og:title"         content="Horario FI" />
  <meta property="og:description"   content="Herramienta para crear tus horarios de la Facultad de Ingeniería" />
  <meta property="og:image"         content="{{ asset('/img/propaganda.png') }}" />
</head>
<body class="top-navigation pace-done">
  <div id="wrapper"></div>
  <script src="{{ asset('/js/app.js') }}" type="text/javascript"></script>
</body>
</html>
