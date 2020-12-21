
<!DOCTYPE html>
<html lang="en">
<head>
    
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

	<link rel="stylesheet" type="text/css" href="{{ asset('/css/login.css') }}">
    <title>Document</title>

  
</head>
<body>

    <body>
       <div class="container">
          <div class="col-md-6 mx-auto text-center">
             <div class="header-title">
                <h1 class="wv-heading--title">
                  SMT.com
                </h1>
                <h2 class="wv-heading--subtitle">
                   Inscrivez-vous
                </h2>
             </div>
          </div>
          <div class="row">
             <div class="col-md-4 mx-auto">
                <div class="myform form" >
                <form action="{{route('contact_path')}}" method="post" name="login">
                    {{ csrf_field()}}
                      <div class="form-group">
                         <input type="text" name="name"  value="{{ old('name')}}"  class="form-control my-input" id="name" required  placeholder="Name">
                         {!! $errors->first('name',"<span style='color:red;'> :message </span>")!!}
                      </div>
                      <div class="form-group">
                         <input type="email" name="email"  class="form-control my-input" id="email" placeholder="Email"  required>
                      </div>
                      <div class="form-group">
                         <input type="password" min="0" name="pass" id="phone" required class="form-control my-input" placeholder="Password">
                       
                      </div>
                      <div class="text-center ">
                         <button type="submit" class=" btn btn-block send-button tx-tfm">Creer un compte</button>
                      </div>
                    
                      <p class="small mt-3">By signing up, you are indicating that you have read and agree to the <a href="#" class="ps-hero__content__link">Terms of Use</a> and <a href="#">Privacy Policy</a>.
                      </p>
                   </form>
                </div>
             </div>
          </div>
       </div>
    </body>
</body>
</html>
