
@extends('Layouts.master');

@if($isStudent)
@section('email')
<div >
<center >
    <div style="width: 50%; border: 1px solid black; margin-top:100px; border-radius: 25px;background-color: white; ">

<form action="email_verification" method="POST">
@csrf
        <label>entrer email</label>
        <input type="text" name="email" class="form-control" placeholder="entrer email"></input><br>
        <label>confirmer l'email</label>
        <input type="text" name="email_confirm" class="form-control" placeholder="confirmer email"></input>
         <button type='submit' class="btn btn-primary"> choisir </button>           
    </form>
</div>
</center>
@endsection
@else
@section('email')
<div >
<center >
    <div style="width: 50%; border: 1px solid black; margin-top:100px; border-radius: 25px;background-color: white; ">
<form action="profemail_verification" method="POST">
@csrf

        <label style="font-size: 25px;">entrer professor  email</label>
        <input type="text" name="email" style="width: 500px;" class="form-control" placeholder="example@uiz.est"></input><br>
        <label style="font-size: 25px;">confirmer l'email</label>
        <input type="text" name="email_confirm" style="width: 500px;" class="form-control" placeholder="Enter password ..."></input>

         <button type='submit' class="btn btn-primary " style="margin: 25px;"> choisir </button>           
    </form>
@endsection
</div>
</center>
@endif