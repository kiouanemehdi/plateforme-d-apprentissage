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
    <option selected="true" disabled="disabled">Choose your class</option> 
        @foreach($class_inscrit as $key)
           
        <option value="{{$key->ID_class}}"> {{$key->class_name}} </option>
        @endforeach
    </select><br>
</div>
</div>
<input type='submit' class="btn btn-primary" value="GOO"></input>
</form>

    <h2>classes dans lesquelles vous n etes pas inscrit</h2><br>
    <div class="col-sm-10">
    <select class="form-control" name="other_class" id="other_class">
    <option selected="true" disabled="disabled">Choose your class</option> 
    
    @foreach($class_others as $key1)
        <option value="{{$key1->ID_class}}"> {{$key1->class_name}} </option>
        @endforeach
    </select><br>
    </div>


 <!-- Modal -->
 <div class="modal fade" id="studentModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
    <form method="POST" id="student_form">
            @csrf
      <div class="modal-header">
        <h5 class="modal-title" >inscription</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      
        <div class="modal-body">
    
                <span id="form_output"></span>
            <div class="form-group row">
                <label >entrer le code de la class</label><br>
                <div class="col-sm-10">
                <input class="form-control" type="text" name="etd_code" id="etd_code"></input><br>
                </div>
           </div>
           <div class="modal-footer">
        <input type="hidden" name="button_action" id="button_action" value="insert" />
         <input type="submit" name="submit" id="action" value="Add" class="btn btn-info" />
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
       </div>
             </form>
    </div>
  </div>
</div>
           

<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
<script type="text/javascript">
    $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
})

$( document ).ready(function() {
    $( "#other_class" ).change(function() {
       // console.log($('#other_class option:selected').val());
        $.ajax({
            type: 'POST',
            url: "{{ url('get_id_new_class') }}",
            data:  {'id_new_class':$('#other_class option:selected').val()}
        });

        $('#studentModal').modal('show');
        $('#student_form')[0].reset();
        $('#form_output').html('');
        $('#button_action').val('insert');
        $('#action').val('Add');
  
    });
    $('#student_form').on('submit', function(event){
        event.preventDefault();
        var form_data = $(this).serialize();
        alert(form_data);
        $.ajax({
             type:'post',
            url:"{{ url('check_class_code') }}",
            data:form_data,
            dataType:"json",
            success:function(data)
            {
                if(data.error.length > 0)
                {
                    var error_html = '';
                    for(var count = 0; count < data.error.length; count++)
                    {
                        error_html += '<div class="alert alert-danger">'+data.error[count]+'</div>';
                    }
                    $('#form_output').html(error_html);
                }
                else
                {
                    $('#form_output').html(data.success);
                    $('#student_form')[0].reset();
                    $('#action').val('Add');
                    $('.modal-title').text('Add Data');
                    $('#button_action').val('insert');
                   // $('#student_table').DataTable().ajax.reload();
                    location.reload();
                }
                
            }
        });
    });
});

</script>
</body>
</html>