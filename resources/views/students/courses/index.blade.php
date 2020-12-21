
@extends('layouts.app')
@section('content')
<h1> {{ $coursesStudent->count() }} Cours </h1>
{{-- <a href="{{ route('students.create') }}">Ajouter un Etudiant</a> --}}
@if (! $coursesStudent->isEmpty())
<ul>
    @foreach ($coursesStudent as $courseStudent)
    {{-- <li> {{ $student->nom }},Prenom:{{ $student->prenom }}</li>  --}}
    <li>{{ $courseStudent->nom }} 

    <form action="/students/{{$student->id}}/courses/{{ $courseStudent->courseId }}" method="POST" class="inline-block" onsubmit="return confirm('Etes-vous Sur');">
            {{ csrf_field() }}
            {{ method_field('DELETE')}}
            <input type="submit" class="btn btn-danger" value="Retirer">
        </form>

        @endforeach
    </ul> 
    
    {{-- {{ $students->links() }} --}}
    @else
    <p>Aucun Cours pour le moment</p>
@endif
<a href="/students/{{$student->id}}">Retourner</a>
 {{-- {{ $course->courseId }} --}}
    
@endsection