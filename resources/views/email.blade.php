
@extends('Layouts.master');

@if($isStudent)
@section('email')
<div >
      

  
<center >
    <div style="width: 50%; border: 1px solid black; margin-top:100px; border-radius: 25px;background-color: white; ">
 @if(Session::get('error-mail')=="true")
   <div class="alert alert-danger alert-block" style="border-radius: 25px;">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <strong>{{ Session::get('error')}}</strong>
   </div>
  @endif
<form action="profemail_verification" id="stt" method="post" >
@csrf
        <label style="font-size:25px; ">Entrer votre  Email</label>
        <input type="text" name="email" id="email" class="form-control" placeholder="example@edu.<?php echo Session::get('domain'); ?> "></input><br>
        <label style="font-size:25px; ">Confirmer Votre Email</label>
        <input type="text" name="email_confirm" id="email_confirm" class="form-control" placeholder="example@uiz.<?php echo Session::get('domain'); ?>  "></input>
         <input type="submit" id="stt" name="" class="btn btn-primary" style="margin-top: 10px;"> 
         <p class="form-mesage"></p>
    </form>
  
</div>
</center>
@endsection
@else
@section('email')
<div >
<center >
    <div style="width: 50%; border: 1px solid black; margin-top:100px; border-radius: 25px;background-color: white; ">
        @if(Session::get('error-mail')=="true")
   <div class="alert alert-danger alert-block" style="border-radius: 25px;">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <strong>{{ Session::get('error')}}</strong>
   </div>
  @endif
<form action="profemail_verification" id="stt" method="post">
@csrf

        <label style="font-size: 25px;">entrer professor  email</label>
        <input type="text" name="email" id="email" style="width: 500px;" class="form-control" placeholder="example@uiz.<?php echo Session::get('domain'); ?> "></input><br>
        <label style="font-size: 25px;">confirmer l'email</label>
        <input type="text" name="email_confirm" id="email_confirm" style="width: 500px;" class="form-control" placeholder="example@uiz.<?php echo Session::get('domain'); ?>  "></input>

         <button type='submit' class="btn btn-primary " style="margin: 25px;"> choisir </button>           
    </form>
@endsection
</div>
</center>
@endif
