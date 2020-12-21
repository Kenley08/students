@extends('layouts.app')
@section('content')
 <h1> {{ $courses->count() }} cours</h1>
{{-- <a href="{{ route('students.create') }}">Ajouter un Etudiant</a> --}}
@if (! $courses->isEmpty())
<ul>
    @foreach ($courses as $course)

    <li><a href="/courses/{{$course->id}}">{{ $course->nom }}</a>
        <form action="{{ route('courses.destroy',$course )}}" method="POST" class="inline-block" onsubmit="return confirm('Etes-vous Sur');">
            {{ csrf_field() }}
            {{ method_field('DELETE')}}
            <input type="submit" class="btn btn-danger" value="Supprimer">
        </form>
      
    </li>
        @endforeach
    </ul> 

    @else
    <p>Aucun cours pour le moment</p>
@endif
    
@endsection