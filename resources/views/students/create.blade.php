@extends('layouts.app')
@section('content')
<h1>Ajouter un Etudiant </h1>

<form action=" {{ route('students.store') }}" method="post" >
        {{ csrf_field() }}
        @include('layouts.partials._form',['submitButtonText'=>"Ajouter un etudiant"])
    </form>
              
          <p><a href="{{ route('home') }}">Annuler</a></p>

@endsection