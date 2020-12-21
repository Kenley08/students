
@extends('layouts.app')
@section('content')
<h1> Ajouter Cours </h1>

   
        <form action="{{ route('courses.store') }}" method="POST">
            {{ csrf_field() }}
            {{-- <div class="form-group has-error"> --}}
                <input type="text" name="nom" class="form-control" placeholder="Ajouter un cours"><hr>
                <input type="submit" class="btn btn-danger" value="Ajouter" class="form-control">
           
        </form>
  
{{-- <a href="/students/{{$student->id}}">Retourner</a> --}}
 
    
@endsection