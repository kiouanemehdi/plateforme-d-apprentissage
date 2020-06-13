<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    
    <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js" defer ></script>
    <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js" defer ></script>       
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />
    <title>Document</title>
</head>
<body>

<form method="post" id="form_choix" action='before_int'>
@csrf
    <h2>classes dans lesquelles vous etes inscrit</h2><br>
    <div class="form-group row">
                
                <div class="col-sm-10">
    <select class="form-control" type="text" name="inscrit_class" id="inscrit_class">
        @foreach($class_inscrit as $key)
        <option selected="true" disabled="disabled">Choose your class</option>    
        <option value="{{$key->ID_class}}"> {{$key->code}} </option>
        @endforeach
    </select><br>
</div>
</div>
<input type='submit' class="btn btn-primary" value="GOO"></input>
</form>
<form method="post" id="form_new_choix" action='before_new_int'>
@csrf
    <h2>classes dans lesquelles vous n etes pas inscrit</h2><br>
    <div class="form-group row">
                
                <div class="col-sm-10">
    <select class="form-control" type="text" name="other_class" id="other_class">
       <option selected="true" disabled="disabled">Choose your new class</option>    
    @foreach($class_others as $key1)
        <option value="{{$key1->ID_class}}"> {{$key1->code}} </option>
        @endforeach
    </select><br>
    </div>
</div>
<input type='submit' class="btn btn-primary" value="GOO"></input>
</form>

<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
<script type="text/javascript">
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
})

<script>
</body>
</html>