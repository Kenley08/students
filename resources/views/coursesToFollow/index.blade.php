@extends('layouts.app')
@section('content')
 <h1> {{ $coursesToFollow->count() }} cours a suivre</h1>
{{-- <a href="{{ route('students.create') }}">Ajouter un Etudiant</a> --}}
@if (! $coursesToFollow->isEmpty())
<ul>
    @foreach ($coursesToFollow as $courseToFollow)
    {{-- <li> {{ $student->nom }},Prenom:{{ $student->prenom }}</li>  --}}
    {{-- <li><a href="/coursesToFollow/{{$courseToFollow->id}}"> {{ $courseToFollow->nom }},Prenom:{{ $courseToFollow->prenom }}</a></li> --}}
    <li>{{ $courseToFollow->courseId }},Prenom:{{ $courseToFollow->studentId }}</li>
        @endforeach
    </ul> 
    {{-- {{ $coursesToFollow->links() }} --}}
    @else
    <p>Aucun cours pour le moment</p>
@endif
    
@endsection