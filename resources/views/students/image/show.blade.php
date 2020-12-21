
@extends('layouts.app')
@section('content')

<div id="imgstudent" style="width:20%; height:30px; background-color:red;">
 <img src="/images/{{ $image->image }}" style="position: relative; width:100%;">

 {{-- <a href="/students/{{$image->id}}/image/{{$image->id}}" style="font-weight:bold;font-size:15px;">Changer</a> --}}
 <a href="/students/{{$student->id}}/image/{{$image->id}}/edit" style="font-weight:bold;font-size:15px;">Changer</a>
 <a href="/students/{{$image->studentId}}" style="font-weight:bold">Retourner</a>
</div>





 
    
@endsection