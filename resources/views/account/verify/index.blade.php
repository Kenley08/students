
<?php
   echo $kod;
?>
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
                  Nous avons envoye un code sur votre compte Gmail, entrer le ci-dessous pour finisaliser le processus
                </h2>
             </div>
          </div>
          <div class="row">
             <div class="col-md-4 mx-auto">
                <div class="myform form ">
                <form action="{{ route('verify_account_path')}}" method="post"  name="login">
                    {{ csrf_field()}}
                    <div class="alert alert-danger" role="alert">
                     {{ $mesaj }}
                   </div>
                      <div class="form-group">

                       
                      <input type="text" name="code" class="form-control my-input" id="code" placeholder="Entrer Code : 000000"  value="{{ old('code') }}" >
                      </div>
                      
                      <div class="text-center ">
                         <button type="submit" class=" btn btn-block send-button tx-tfm">OK</button>
                      </div>
                    
                    
                   </form>
                </div>
             </div>
          </div>
       </div>
    </body>
</body>
</html>
