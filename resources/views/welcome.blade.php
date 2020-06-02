<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ URL::asset('css/acceuil_style.css') }}">

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <title>Document</title>
</head>
<body>

 
<div id="nav-bar">
	<button style="float: right;" type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Login</button>
	<div id="signup-login">
		<ul>
			<li><button id="sinup-b" class="btn btn-secondary" style="margin-right: 15px;">Signup</button></li>
			<li class="drop-down "><a href="instructor-sign-up.php?type=instructor"><button id="instructor-sign-up" class="btn btn-secondary">Signup as intsructor </button></a></li>
			<li class="drop-down"><a href="Sinup-form.php?type=student"><button id="student-sign-up" class="btn btn-secondary">Signup as student </button></li></a>

		</ul>
		
		
	</div>

    <p id="title"><b>Piazza Clone</b></p>
    
	
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Login</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    @if(Session::has('error'))
   <div class="alert alert-danger alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <strong>{{ Session::get('error')}}</strong>
   </div>
  @endif
      <form method="post" action="check_login" id="login-form-d">
        <div class="modal-body">
            @csrf
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                <input class="form-control" type="text" name="email" id="login-form-email"></input><br>
                </div>
           </div>
           <div class="form-group row">
                <label class="col-sm-2 col-form-label">Password</label>
                <div class="col-sm-10">
                <input class="form-control" type="password" name="password" id="login-form-pass"></input>
                </div>
             </div>
        </div>
       
        <div class="modal-footer">
           <p id="error-form" style="color: red"></p>
            <a href="#">  Mot de pass oublie ?</a>
            <button type="submit" class="btn btn-primary">Log in</button>
        </div>
      </form>
    </div>
  </div>
</div>
<div id="slider">
<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">
    <div class="item active">
       <!--<img src="https://www.caci.co.uk/sites/default/files/styles/showcase-image/public/article%20header%202000px.jpg?itok=7kCjWLky" alt="...">-->
      
    </div>
    <div class="item">
     <!-- <img src="https://www.caci.co.uk/sites/default/files/styles/showcase-image/public/article%20header%202000px.jpg?itok=7kCjWLky" alt="...">-->
      
    </div>
   
  </div>

  <!-- Controls -->
  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
</div>
<center>
<div id="late-signup">
<form action="universite" method='get'>

	<button type='submit' name="type" value="etd" class="btn btn-primary">Get Started as Student </button>

	<button type='submit' name="type" value="prf" class="btn btn-primary">Get Started as Instructor </button>

</form>
	
</div>
</center>
<center>
<div id="end-nav-bar">
	<p>Copyright  </p>
	<p>contact us </p>
	<p>About us</p>
	
</div>
</center>

	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

<script type="text/javascript">
	var click=false;
	$("#sinup-b").click(function(){
		
		if(!click){
             $(".drop-down").show();
         click=true;
		}else{
			 $(".drop-down").hide();
             click=false;
		}
	});
  
  $("#login-form-d").submit(function(event){
    if($("#login-form-email").val()=="" ||$("#login-form-email").val()==" " ){
           event.preventDefault();
           $("#error-form").text("");
           $("#error-form").append("<strong>Email Error</strong>");
    }else if($("#login-form-pass").val()=="" ||$("#login-form-pass").val()==" " ){
           event.preventDefault();
           $("#error-form").text("");
           $("#error-form").append("<strong>pass Error</strong>");
    }
    
    
  else{

  }

    
  });
  function isEmail(email) {
  var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
  return regex.test(email);
}

</script>
</body>
</html>