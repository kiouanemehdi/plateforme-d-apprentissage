<!DOCTYPE html>
<html lang="en">
<head>
	 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
  
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
     <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js" defer ></script>
    <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js" defer ></script>       
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <title>Document</title>
          <script>
          	$(document).ready(function(){
               /*          $("#stt").submit(function(event){
    	       event.preventDefault();
             alert("ddd");
    	    var t="<?php //echo Session::get('domain'); ?>";
          var email1=$("#emaill").val();
           var email2=$("#email_confirm").val();
              var form_data = $(this).serialize();
            var e=false;
           if(email1===email2)
             {
           
              var dom = email1.substr(email1.length-3,email1.length-1);
              if(dom === t){


               
              //  window.location.href = "{{ route('profemail_verification')}}";

              }else{
                alert("domain are not equal");
              }
                  
              
          
              
            
           

    
    	}

    	  
        
     
    });*/
          	});
   
</script>

</head>
<body style="background-color: #e2edf6; ">
<div>

@yield('email')

</div> 
<div>
	@yield('last')
</div>   
</body>


</html>
