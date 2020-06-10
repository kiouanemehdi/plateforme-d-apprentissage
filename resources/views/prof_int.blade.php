
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

    <title>Document</title>
</head>
<body>
    <div class="grid-container">
        <div class="header">
        <h2 style="float:left;" id='name'> bienvenue ** {{ Session::get('prf_username')}} ** id : {{ Session::get('id_prf')}} ** </h2>
        <div class="">
        <button name="add-class" id="add-class" type="button" class="btn btn-primary" data-toggle="modal" >ADD NEW Class</button>
        </div>
        <div>
        <p>My Class</p>
       <select id="select_id" >

<<<<<<< HEAD
       @foreach ($namess as $key => $val)
         
       <option class="form-control">{{$val}}</option>
=======
       @foreach ($namess as $key )
       <option value="{{$key['ID_class']}}" class="form-control">{{$key['code']}}</option>
>>>>>>> 2e198368cda38808e2acc6ff1885b2dadc3d5ac2
    
@endforeach

       </select>
        </div>
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
                        <th style="display:none;">id</th>
                    </tr>
                </thead>
         </table>
        </div>

        <div class="reponse">
            <table id="reponse_table" class="table table-bordered" style="width:100%">
                    <thead>
                        <tr>   
                            <th>id etd</th>
                            <th>contenu</th>
                        </tr>
                    </thead>
            </table>
        </div>
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
   <!-- Modal -->
<div class="modal fade" id="add-class-form" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
    <form method="POST" id="class-form">
            @csrf
      <div class="modal-header">
        <h5 class="modal-title" >Nouveau Class</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      
        <div class="modal-body">
    
                <span id="form_output3"></span>
            <div class="form-group row">
                <label class="col-sm-2.5 col-form-label">Class name</label>
                <div class="col-sm-10">
               <input class="form-control" type="text" name="class-name" id="class-name">
                </div>
           </div>
            <div class="form-group row">
                <label class="col-sm-2.5 col-form-label">Class Code </label>
                <div class="col-sm-10">
                <input class="form-control" type="text" name="class_code" id="class_code"></input><br>
                </div>
           </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Semester</label>
                <div class="col-sm-10">
                <select class="form-control" type="text" name="class_semestre" id="class_semsestre">
                    <option value="1">s1</option>
                    <option value="2">s2</option>
                    <option value="3">s3</option>
                    <option value="4">s4</option>
                </select><br>
                </div>
           </div>
           
        </div>
       
        <div class="modal-footer">
        <input type="hidden" name="class_button_action" id="class_button_action" value="insert" />
         <input type="submit" name="submit" id="add-class-action" value="Add" class="btn btn-info" />
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

//get id of the selected class
$(document).ready(function() {
    $("#select_id").change(function(){
        //alert($('#select_id option:selected').val());
        $.ajax({
            type: 'POST',
            url: "{{ url('get_id_class') }}",
            data:  {'id_class':$('#select_id option:selected').val()}
        });
  //  });



//$("#select_id").change(function(){
    $('#student_table').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('postg') }}",
        columns:[
            { data: "objet",name:"objet" },
            { data: "detail",name:"detail" },
            { data: "type",name:"objet" },
            { data: "id",name:"id",visible: false }         
        ],
        bDestroy: true
     });
     var table = $('#student_table').DataTable();
    $('#student_table tbody').on( 'click', 'tr', function () {
            var row= table.row( this ).data();
            var id=row['id'];
            //var seft_id="'"+id+"'";
            console.log(id );
             $.ajax({
                url: "{{ url('get_id_rep') }}",
                type: "post",
                data:{'ID_pst':id}
                
                });

                $('#reponse_table').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: "{{ route('reponse_get') }}",
                    columns:[
                        { data: "ID_etd",name:"ID_etd" },
                        { data: "contenu",name:"contenu" }        
            ],
            bDestroy: true
        });
        });
    });

   // $('#reponse_table').DataTable().clear();
   // $('#reponse_table').DataTable().destroy();
   

   
 
     /*$(document).ready(function() {
        $('#reponse_table').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('reponse_get') }}",
            columns:[
                { data: "ID_etd",name:"ID_etd" },
                { data: "contenu",name:"contenu" }        
            ]
        });
    });*/
     

//add post
     $('#add_data').click(function(){
        $('#studentModal').modal('show');
        $('#student_form')[0].reset();
        $('#form_output').html('');
        $('#button_action').val('insert');
        $('#action').val('Add');
    });
     //add class
      $('#add-class').click(function(){
        $('#add-class-form').modal('show');
        $('#class-form')[0].reset();
        $('#form_output3').html('');
        $('#class_button_action').val('insert');
        $('#add-class-action').val('Add');
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
    //add new class logic
     $('#class-form').on('submit', function(event){
        event.preventDefault();
        var form_data = $(this).serialize();
        alert(form_data);
        $.ajax({
             type:'post',
            url:"{{ url('addclasss') }}",
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
                    $('#form_output3').html(error_html);
                }
                else
                {
                    $('#form_output3').html(data.success);
                    $('#class-form')[0].reset();
                    $('#addclass-action').val('Add');
                  //  $('.modal-title').text('Add Data');
                    $('#class_button_action').val('insert');
                   // $('#student_table').DataTable().ajax.reload();
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