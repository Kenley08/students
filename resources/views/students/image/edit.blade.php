@extends('layouts.app')
@section('content')
<h1>Mis a jour</h1>

<form action="/students/{{$image->studentId}}/image/{{$image->id}}" method="post"  enctype="multipart/form-data">
        {{ csrf_field() }}
        {{ method_field('PUT')}}
       
        <div class="form-group"> 
       
            <label for="picture">Prenez une Photo</label>
            <input type="file" name="picture"  class="form-control">
          
        <input type="submit" value="Modifier"  class="btn btn-primary btn-block" >
          
        </div>
   
</form> 

    <p><a href="/students/{{$image->studentId}}/image/{{$image->id}}" style="font-weight:bold">Retourner</a></p>


@endsection