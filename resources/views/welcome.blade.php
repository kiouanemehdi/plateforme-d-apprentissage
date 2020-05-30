<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ URL::asset('css/acceuil_style.css') }}">
    <script
    src="https://code.jquery.com/jquery-3.5.1.js"
    integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
    crossorigin="anonymous">
    </script>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
 <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Document</title>
</head>
<body>
<div id="nav-bar">
	<a href="login-form.php"><button style="float: right;" class="btn btn-primary">Login</button></a>
	<div id="signup-login">
		<ul>
			<li><button id="sinup-b" class="btn btn-secondary" style="margin-right: 15px;">Signup</button></li>
			<li class="drop-down "><a href="instructor-sign-up.php?type=instructor"><button id="instructor-sign-up" class="btn btn-secondary">Signup as intsructor </button></a></li>
			<li class="drop-down"><a href="Sinup-form.php?type=student"><button id="student-sign-up" class="btn btn-secondary">Signup as student </button></li></a>

		</ul>
		
		
	</div>

    <p id="title"><b>Piazza Clone</b></p>
    
	
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
	
</script>
</body>
</html>