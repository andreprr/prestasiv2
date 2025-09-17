<!DOCTYPE html>
<html data-bs-theme="light" lang="en-US" dir="ltr">

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title') | {{ config('app.name') }} </title>
    <!-- laravel CRUD token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('images/logos/logo-app-sm.png') }}">
    <meta name="theme-color" content="#ffffff">

    @include('layouts/landing/styles')
  </head>

  <body>
    @yield('content')
    @include('layouts/landing/scripts')
  </body>

</html>