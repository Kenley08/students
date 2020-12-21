
@extends('layouts.app')
@section('content')
<h1> Modifier Cours </h1>

   
        <form action="{{ route('courses.update',$course) }}" method="POST">
            {{ csrf_field() }}
            {{ method_field('PUT') }}
       
        <input type="text" name="nom" class="form-control" value="{{$course->nom }}" ><hr>
                <input type="submit" class="btn btn-danger" value="Ajouter" class="form-control">
           
        </form> 
        {{-- <a href="/students/{{$student->id}}">Retourner</a>  --}}

    {{ $course->nom }}
@endsection