@extends('Layouts.master');

@if($isStudent)
@section('last')
<form  action="last_step_etd" method="POST">
@csrf
        <label>verification code</label>
        <input type="text" name="code"></input><br>
        <label>username</label>
        <input type="text" name="username" ></input><br>
        <label>password</label>
        <input type="password" name="password"></input><br>
        <label>confirm password</label>
        <input type="password" name="confirm_password"></input><br>
         <button type='submit' name="confirmer"> confirmer </button>           
    </form>
@endsection
@else
@section('last')
<form  action="last_step_prf" method="POST">
@csrf
        <label>verification code</label>
        <input type="text" name="code"></input><br>
        <label>username</label>
        <input type="text" name="username" ></input><br>
        <label>password</label>
        <input type="password" name="password"></input><br>
        <label>confirm password</label>
        <input type="password" name="confirm_password"></input><br>
         <button type='submit' name="confirmer"> confirmer </button>           
    </form>
@endsection
@endif


