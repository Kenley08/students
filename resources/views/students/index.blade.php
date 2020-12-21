@extends('layouts.app')
@section('content')
 <h1> {{ $students->count() }} {{ str_plural('Etudiant',$students->count() )}}</h1>
{{-- <a href="{{ route('students.create') }}">Ajouter un Etudiant</a> --}}
@if (! $students->isEmpty())
<ul>
    @foreach ($students as $student)
    {{-- <li> {{ $student->nom }},Prenom:{{ $student->prenom }}</li>  --}}
    <li><a href="/students/{{$student->id}}"> {{ $student->nom }},Prenom:{{ $student->prenom }}</a></li>
        @endforeach
    </ul> 
    {{ $students->links() }}
    @else
    <p>Aucun etudiant pour le moment</p>
@endif
    


@endsection