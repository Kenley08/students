@extends('layouts.app')
@section('content')
<h1>Mofidier l'Etudiant #{{ $student->id}}</h1>

<form action="{{ route('students.update',$student)}}" method="post"  enctype="multipart/form-data">
        {{ csrf_field() }}
        {{ method_field('PUT')}}
        @include('layouts.partials._form',['submitButtonText'=>"Modifier l'etudiant"])
     
                
    </form>

    <p><a href="/students/{{$student->id}}/image/{{$image->id}}" style="font-weight:bold">Voir Photo</a></p>
    <p><a href="{{ route('home') }}">Annuler</a></p>
    

@endsection