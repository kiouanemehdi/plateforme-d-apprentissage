
@if(!session('status'))

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ URL::asset('css/style_prof.css') }}">
       
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    
    <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js" defer ></script>
    <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js" defer ></script>       
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />
<meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Document</title>
</head>
<body>
    <div class="grid-container">
        <div class="header">
        <h2 style="float:left;" id='name'> bienvenue ** {{ Session::get('prf_username')}} ** id : {{ Session::get('id_prf')}} </h2>
        <a style="float:right;" class="btn btn-primary" href="logout">Log out</a>
        </div>
        <div class="">
        <button name="add" id="add_data" type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">ADD NEW POST</button>
        </div>
        <div class="post">
            <table id="student_table" class="table table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>objet</th>
                        <th>detail</th>
                        <th>type</th>
                    </tr>
                </thead>
         </table>
        </div>
        <div class="reponse"></div>
        <div class="avg_qst_rep_time"></div>
        <div class="people_online"></div>
    </div>

    <!-- Modal -->
<div class="modal fade" id="studentModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
    <form method="POST" id="student_form">
            @csrf
      <div class="modal-header">
        <h5 class="modal-title" >Nouveau Post</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      
        <div class="modal-body">
    
                <span id="form_output"></span>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Type</label>
                <div class="col-sm-10">
                <select class="form-control" type="text" name="type" id="type">
                    <option>A</option>
                    <option>B</option>
                    <option>C</option>
                </select><br>
                </div>
           </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">objet</label>
                <div class="col-sm-10">
                <input class="form-control" type="text" name="objet" id="objet"></input><br>
                </div>
           </div>
           <div class="form-group row">
                <label class="col-sm-2 col-form-label">Detail</label>
                <div class="col-sm-10">
                <textarea class="form-control"  name="detail" id="detail"></textarea>
                </div>
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
$(document).ready(function() {
     $('#student_table').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('postg') }}",
        columns:[
            { data: "objet",name:"objet" },
            { data: "detail",name:"detail" },
            { data: "type",name:"objet" }         
        ]
     });

     $('#add_data').click(function(){
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
            url:"{{ url('posts') }}",
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
                    $('#student_table').DataTable().ajax.reload();
                }
            }
        });
    });

});
window.history.forward();
</script>
</body>
</html>
@endif