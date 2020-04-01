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
    	@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif
    @if (session('reset'))
    <div class="alert alert-success">
        {{ session('reset') }}
    </div>
@endif
    @if (session('updateprofile'))
    <div class="alert alert-success">
        {{ session('updateprofile') }}
    </div>
@endif

<ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item">
    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home"
      aria-selected="true">Home</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile"
      aria-selected="false">Edit Profile</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact"
      aria-selected="false">Reset password</a>
  </li>
</ul>
<div class="tab-content" id="myTabContent">
  <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">

        <h1>
          welcome USER
        </h1>
  	<form >
  		<dir>
  		
  		
  		</dir>
  	</form>
  </div>
  <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
    <h1>
          Profile Update
        </h1>


            <div class="container">
      <form action="/profileupdate" method="post">
        
        {{ csrf_field() }}
 
 <input type="text" id="defaultRegisterFormEmail" name="id" class="form-control mb-4" placeholder="ID">
 <input type="text" id="defaultRegisterFormEmail" name="name" class="form-control mb-4" placeholder="Name">
<input type="text" id="defaultRegisterFormEmail" name="fname" class="form-control mb-4" placeholder="Father Name">
    <input type="text" id="defaultRegisterFormEmail" name="mname" class="form-control mb-4" placeholder="Mother Name">
    <input type="text" id="defaultRegisterFormEmail" name="place" class="form-control mb-4" placeholder="Plcace">
    <input type="date" id="defaultRegisterFormEmail" name="date" class="form-control mb-4" placeholder="DOB">
    <input type="file" id="defaultRegisterFormEmail" name="image" class="form-control mb-4" >

    <!-- E-mail -->
    <input type="email" id="defaultRegisterFormEmail" name="email" class="form-control mb-4" placeholder="E-mail">


<input type="submit" name="SUBMIT">

      </form>
    </div>






  </div>
  <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
  	<h1>
          Password Reset
        </h1>
  	<div class="container">
  		<form action="/passwordreset" method="post">
  			
  			{{ csrf_field() }}
 
 <input type="text" id="defaultRegisterFormEmail" name="id" class="form-control mb-4" placeholder="ID">
 <input type="password" id="defaultLoginFormPassword" name="password" class="form-control mb-4" placeholder="Password">

<input type="submit" name="SUBMIT">

  		</form>
  	</div>

  </div>
</div>
    </body>
</html>
