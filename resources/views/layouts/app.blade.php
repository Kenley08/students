<!DOCTYPE html>
<html lang="en">
<head>
    
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
<link rel="stylesheet" type="text/css" href="{{ asset('/css/bootstrap.min.css') }}">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="{{ asset('/css/app.css') }}">
<script src="{{ asset('/js/jquery.min.js') }}"></script>
{{-- <script src="{{ asset('/js/main.js') }}"></script> --}}

    <title>Document</title>
    <style>
        .help-block{
        color:red;
        font-weight: bold;
        font-style: italic;
    }
    h1{
        font-family: Open Sans;
    }
    </style>
</head>
<body>

    @include('layouts.partials._nav')
    <div class="container">
        @if (session()->has('notification.message'))
    <div class="alert alert-{{session('notification.type')}}">
            {{ session('notification.message') }}
        </div>
        @endif
      
        @yield('content')
    </div>
    {{-- <script src="{{ asset('/js/main.js') }}"></script> --}}
   <script src="{{ asset('js/larails.js') }}"></script>
   {{-- @include('flashy::message') --}}
</body>
</html>