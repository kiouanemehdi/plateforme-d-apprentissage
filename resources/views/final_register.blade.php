@extends('Layouts.master');

@if($isStudent)
@section('last')
<center>
<div style="width: 50%; border: 1px solid black; margin-top:50px; border-radius: 25px;background-color: white; " >
    
<form  action="last_step_etd" method="POST">
@csrf
        <label>verification code</label>
        <input type="text" name="code" class="form-control" ></input><br>
        <label>username</label>
        <input type="text" class="form-control"  name="username" ></input><br>
        <label>password</label>
        <input type="password" name="password" class="form-control"></input><br>
        <label>confirm password</label>
        <input type="password" name="confirm_password" class="form-control"></input><br>
         <button type='submit' name="confirmer" class="btn btn-primary"> confirmer </button>           
    </form>
</div>
    </center>
@endsection
@else
@section('last')
<center>
    <div style="width: 50%; border: 1px solid black; margin-top:50px; border-radius: 25px;background-color: white; " >

<form  action="last_step_prf" method="POST">
@csrf
        <label>verification code</label>
        <input type="text" name="code" class="form-control"></input><br>
        <label>username</label>
        <input type="text" name="username" class="form-control" ></input><br>
        <label>password</label>
        <input type="password" name="password" class="form-control"></input><br>
        <label>confirm password</label>
        <input type="password" name="confirm_password" class="form-control"></input><br>
         <button type='submit' name="confirmer" class="btn-primary"> confirmer </button>           
    </form>
</div>
    </center>
@endsection
@endif


