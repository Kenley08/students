@extends('layouts.app')
@section('content')
<h1>Etudiant {{$student->id}}</h1>
<p>Nom:{{ $student->nom }}, Prenom:{{ $student->prenom }}, sexe:{{ $student->sexe}}, Telephone:{{ $student->telephone }},  email:{{ $student->email }} </p>
<a class ="btn btn-default" href="{{ route('students.edit',$student->id)}}">Modifier</a>

{{-- 
<a href="{{ route('students.destroy',$student ) }}" data-method="DELETE" data-confirm="Etes-vous sur" class="btn btn-danger">Supprimer</a> --}}

<form action="{{ route('students.destroy',$student )}}" method="POST" class="inline-block" onsubmit="return confirm('Etes-vous Sur');">
    {{ csrf_field() }}
    {{ method_field('DELETE')}}
    <input type="submit" class="btn btn-danger" value="Suppimer">
</form>
<a class ="btn btn-default" style="font-weight: bold" href="{{ route('students.courses.index',$student->id)}}">Ses Cours</a>
<hr>

<form action="/students/{{$student->id}}/courses" method="POST">
    {{ csrf_field() }}
    {{-- <div class="form-group has-error"> --}}
    <input type="hidden"  name="studentId" value="{{ $student->id }}">
        <select name="courseName" class="form-control">
            <option selected value="">Selectionner un cours </option>
            @foreach ($courses as $course)
                 <option value="{{ $course->id }}">{{$course->nom}}</option>
            @endforeach
        </select>
        <hr>
        <input type="submit" class="btn btn-success" value="Ajouter ce cours a suivre">
    {{-- </div> --}}

   
</form>
<hr>

<p><a href="{{ route('home') }}">Tous les Etudiants</a></p>

{{-- {{$image->image}} --}}
@endsection