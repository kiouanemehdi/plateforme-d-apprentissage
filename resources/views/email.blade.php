
@extends('Layouts.master');

@if($isStudent)
@section('email')
<form action="email_verification" method="POST">
@csrf
        <label>entrer email</label>
        <input type="text" name="email"></input><br>
        <label>confirmer l'email</label>
        <input type="text" name="email_confirm"></input>
         <button type='submit'> choisir </button>           
    </form>
@endsection
@else
@section('email')
<form action="profemail_verification" method="POST">
@csrf
        <label>entrer professor  email</label>
        <input type="text" name="email"></input><br>
        <label>confirmer l'email</label>
        <input type="text" name="email_confirm"></input>

         <button type='submit'> choisir </button>           
    </form>
@endsection

@endif