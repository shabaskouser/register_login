<!DOCTYPE html>
<html>
   <head> 
<!-- Font Awesome -->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
<!-- Google Fonts -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
<!-- Bootstrap core CSS -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
<!-- Material Design Bootstrap -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.14.1/css/mdb.min.css" rel="stylesheet">
<!-- JQuery -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<!-- Bootstrap tooltips -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/js/bootstrap.min.js"></script>
<!-- MDB core JavaScript -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.14.1/js/mdb.min.js"></script>
 </head>
    <body>
            @if (session('login'))
    <div class="alert alert-danger">
        {{ session('login') }}
    </div>
@endif

  @if (session('register'))
    <div class="alert alert-success">
        {{ session('register') }}
    </div>
@endif
       <center>
        

           <!-- Default form login -->
<form class="text-center border border-light p-5" action="/login" method="post">
  {{ csrf_field() }}
<div class="container">
    <p class="h4 mb-4">Sign in</p>

    <!-- Email -->
    <input type="email" id="defaultLoginFormEmail" name="email" class="form-control mb-4" placeholder="E-mail">

    <!-- Password -->
    <input type="password" id="defaultLoginFormPassword" name="password" class="form-control mb-4" placeholder="Password">

    <div class="d-flex justify-content-around">
        <div>
            <!-- Remember me -->
            <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="defaultLoginFormRemember">
                <label class="custom-control-label" for="defaultLoginFormRemember">Remember me</label>
            </div>
        </div>
        <div>
            <!-- Forgot password -->
            <a href="">Forgot password?</a>
        </div>
    </div>

    <!-- Sign in button -->
    <button class="btn btn-info btn-block my-4" type="submit">Sign in</button>

    <!-- Register -->
    <p>Not a member?
        <a href="{{ url('/register') }}">Register</a>
    </p>

   </div>
</form>
       </center>
    </body>
</html>