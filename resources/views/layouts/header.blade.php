<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
   

    <title>{{ config('app.name', 'hopac canteen') }}</title>

    <!-- Scripts -->
    
      <!-- Favicon icon -->
      
      <!-- <link rel="icon" type="image/png" sizes="16x16" href="{{asset('/custom/assets/images/favicon.png')}}"> -->

    <!-- Fonts -->
     <!-- Custom CSS -->
     <!-- <link href="{{asset('/custom/assets/libs/flot/css/float-chart.css')}}" rel="stylesheet">
   
     
    <link href="{{('/custom/dist/css/style.min.css')}}" rel="stylesheet"> -->


    <!-- <link href="{{asset('/custom/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('/customauth/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css"> -->
 
</head>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
<main>
            @yield('content')
        </main>