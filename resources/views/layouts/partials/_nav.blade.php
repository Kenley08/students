<nav class="navbar navbar-expand-lg navbar-light bg-light" >
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
      {{-- <a class="navbar-brand" href="#">Eventbrote</a> --}}
      <ul class="nav navbar-nav mr-auto mt-2 mt-lg-0 ">
        <li class="nav-item active">
            <a class="nav-link" href="{{route('home') }}">Acceuil <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="{{route('courses.index') }}">Tous Les cours <span class="sr-only">(current)</span></a>
          </li>
        <li class="nav-item">
            <p class="navbar-btn"> 
            <a href="{{ route('students.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i>Ajouter un etudiant</a>
            </p>
        
        </li>

        <li class="nav-item">
          <p class="navbar-btn" style="margin-left:4px;"> 
          <a href="{{ route('courses.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i>Ajouter un cours</a>
          </p>
      
      </li>

      <li class="nav-item">
        <p class="navbar-btn" style="margin-left:4px;"> 
          {{-- <button type="button" type="submit" class="btn btn-link">Deconnexion</button> --}}

         <a href="{{route('logout_path') }}">
          <input type="submit" name="deconnexion" id="deconnexion" value="Deconnexion" class="btn btn-link">
        </a> 
        </p>
    
    </li>

     
       
      </ul>
     
    </div>
  </nav>