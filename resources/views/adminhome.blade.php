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
 @if (session('statusupdate'))
    <div class="alert alert-success">
        {{ session('statusupdate') }}
    </div>
@endif
 @if (session('statusnotupdate'))
    <div class="alert alert-danger">
        {{ session('statusnotupdate') }}
    </div>
@endif
<ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item">
    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home"
      aria-selected="true">Home</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile"
      aria-selected="false">View User</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact"
      aria-selected="false">Reset password</a>
  </li>
</ul>
<div class="tab-content" id="myTabContent">
  <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">

        <h1>
          welcome Admin
        </h1>
  	<form >
  		<dir>
  		
  		
  		</dir>
  	</form>
  </div>
  <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
    <h1>
          Block or unblock
        </h1>


            <div class="container">
<table class="table">
  <thead class="black white-text">
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Name</th>
      <th scope="col">Father Name</th>
      <th scope="col">Mother Name</th>
      <th scope="col">Place</th>
      <th scope="col">Date</th>
      <th scope="col">Email</th>
      <th scope="col">User Images</th>
      <!-- <th scope="col">status</th> -->
      <th scope="col">Block | unBlock</th>
    </tr> 
    @foreach ($users as $user)
  </thead>
  <tbody>
    <tr>
      
      <td>{{ $user->id }}</td>
      <td>{{ $user->name }}</td>
      <td>{{ $user->fname }}</td>
      <td>{{ $user->mname }}</td>
      <td>{{ $user->place }}</td>
      <td>{{ $user->date }}</td>
      <td>{{ $user->email }}</td>
     <td>
      <img src="/public/image/{{ $user->image }}" alt="img" height="100px" width="100px"> </td>
      <!-- <td>{{ $user->status }}</td> -->
      <td>
        <form action='/updateUser{{ $user->id }}' method="POST">
{{ csrf_field() }}

<!-- <input type="text" name="status" pattern="[0,1]+" placeholder="0 | 1" value=""><br> -->



<input type="radio"  id="option1" name="status" value="0"  {{ ($user->status=="0")? "checked" : "" }} >BLOCKED</label>



<input type="radio" id="option2" name="status" value="1" {{ ($user->status=="1")? "checked" : "" }} >ACTIVE</label>

<input type="submit" name="SUBMIT">
</form>
      </td>

    </tr>
    @endforeach
  
    
  </tbody>
</table>

    </div>





  </div>
  <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
  	<h1>
          Password Reset
        </h1>
  	<div class="container">
  		<form action="/adminpasswordreset"  method="post">
  			
  			{{ csrf_field() }}
 
 
 <input type="password" id="defaultLoginFormPassword" name="password" class="form-control mb-8" placeholder="New Password">

<input type="submit" name="SUBMIT">

  		</form>
  	</div>

  </div>
</div>
    </body>
</html>
