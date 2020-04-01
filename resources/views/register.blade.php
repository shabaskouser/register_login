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
<body align="center">
<div class="container">
<h1> Register User </h1>
 

</div>


<!-- Default form register -->
<form class="text-center border border-light p-5" action='/registerUser' method="POST" enctype="multipart/form-data">
{{ csrf_field() }}
    <p class="h4 mb-4">Sign up</p>
<dir class="container">
    <div class="form-row mb-4">
        <div class="col">
            <!-- First name -->
            <input type="text" id="defaultRegisterFormFirstName" name="name" class="form-control" placeholder="NAME">
        </div>
    </div>
    <input type="text" id="defaultRegisterFormEmail" name="fname" class="form-control mb-4" placeholder="Father Name">
    <input type="text" id="defaultRegisterFormEmail" name="mname" class="form-control mb-4" placeholder="Mother Name">
    <input type="text" id="defaultRegisterFormEmail" name="place" class="form-control mb-4" placeholder="Plcace">
    <input type="date" id="defaultRegisterFormEmail" name="date" class="form-control mb-4" placeholder="DOB">
    <input type="file" id="defaultRegisterFormEmail" name="image" class="form-control mb-4" >
   @if (session('notimg'))
    <div class="alert alert-danger">
        {{ session('notimg') }}
    </div>
@endif
    <!-- E-mail -->
    <input type="email" id="defaultRegisterFormEmail" name="email" class="form-control mb-4" placeholder="E-mail">

    <!-- Password -->
    <input type="password" id="defaultRegisterFormPassword" name="password" class="form-control" placeholder="Password" aria-describedby="defaultRegisterFormPasswordHelpBlock">
    <small id="defaultRegisterFormPasswordHelpBlock" class="form-text text-muted mb-4">
        At least 6
    </small>

  <div class="col-md-4 col-md-offset-4 error">
            <ul>
                @foreach($errors->all() as $error)
                   <b> <li>{{$error}}</li></b>
                @endforeach
            </ul>
        </div>
    <button class="btn btn-info my-4 btn-block" name="SUBMIT" type="submit" >SIGN UP</button>
<p>Alredy member?
        <a href="{{ url('/login') }}">Login</a>
    </p>
   

</dir>
</form>
<!-- Default form register -->
</body>
</html>