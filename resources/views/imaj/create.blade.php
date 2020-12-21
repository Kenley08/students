@extends('layouts.app')
@section('content')
<h1>Ajouter un Etudiant </h1>

<form action="{{ route('imaj.store') }}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
       
        <div class="form-group"> 
       
            <label for="picture">Prenez une Photo</label>
            <input type="file" name="picture"  class="form-control">
            <input type="hidden" name="studentid"  value="<?php
            if(isset($_GET['student'])){
                echo $_GET['student'];
            }
            
            ?>" class="form-control">
        <input type="submit" value="Ajouter"  class="btn btn-primary btn-block" >
          
        </div>
    </form>
              
      <p><a href="{{ route('home') }}">Annuler</a></p>
    
      
      <?php  
       echo $firstname;
       echo $lastname;
      echo $sex;
       echo $phone;
       echo $imel;
    ?>
@endsection

