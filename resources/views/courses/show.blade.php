
@extends('layouts.app')
@section('content')
<h1> Modifier Cours </h1>

   
        <form action="{{ route('courses.update',$course) }}" method="POST">
            {{ csrf_field() }}
            {{ method_field('PUT') }}
            {{-- <div class="form-group has-error"> --}}
                <input type="text" name="nom" class="form-control"value="{{ old('non') ?? $course->nom }}" placeholder="Modifier un cours"><hr>
                <input type="submit" class="btn btn-danger" value="Modifier" class="form-control">
           
        </form>


{{-- <a href="/students/{{$student->id}}">Retourner</a> --}}
 
    
@endsection