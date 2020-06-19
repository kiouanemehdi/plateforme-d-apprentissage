
@if(!session('status'))

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
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
        <div class="header" style="background-color: #f7fff7" >
        <img style="margin:0;" src="{{ URL::asset('img/logo-sfe.png') }}">
            <!-- <h2 style="float:left;" id='name'> Bienvenue: {{ Session::get('prf_username')}} </h2>-->
     
     <select id="select_id" style="margin-left:370px; 

  height: 40px;
  border: 2px solid #4c99ab;
  border-radius: 5px;
  overflow: hidden;"  >  
          
          <option selected="true" disabled="disabled">Choose your class</option>
       @foreach ($namess as $key )
       <option value="{{$key['ID_class']}}" class="form-control">{{$key['class_name']}}</option>
    
@endforeach

       </select> 

        <a style="float:right;" class="btn" href="logout" id="logout">Log out</a>
        <button name="add-class" id="add-class" type="button" class="btn btn-info" data-toggle="modal" >ADD NEW Class</button>
        </div>
        <button name="add" id="add_data" type="button" class="btn" data-toggle="modal" data-target="#exampleModal">ADD NEW POST</button>

        <div class="post">
        <center> <h4 style="font-weight: bold;margin-top:20px;color:#4c99ab;">My posts</h4></center>
            <table id="student_table" class="" style="width:400px ;">
                <thead style="display:none;">
                    <tr>
                        
                        <th>objet</th>
                        <th>detail</th>
                        <th>type</th>
                        <th style="display:none;">id</th>
                    </tr>
                </thead>
         </table><br>
         <center> <h4 style="font-weight: bold;color:#4c99ab;">Student Posts</h4></center>
          <table id="student_table_post" class="" style="width:400px;" >
                <thead style="display:none;">
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
            <table id="reponse_table" class="" width="900px">
                    <thead style="display:none;">
                        <tr>   
                           
                            <th>Posts</th>
                            <th width="">u</th> 
                            <th>verification</th> 
                            <th style="display:none;">id_rep</th>
                            <th id="ver">verification_choix</th>
                        </tr>
                    </thead>
            </table>
             <div class="write_rep" style="margin-left: 30px;">
            <form method="POST" id="student_rep" >
            <span id="form_output2"></span>
                <div class="form-group row">
                    
                    <div class="col-sm-10">
                    <textarea class="form-control" type="text" name="contenu" id="contenu"></textarea>
                    </div>
           

            <input type="hidden" name="button_action2" id="button_action2" value="insert" />
         <input type="submit" name="submit" id="action2" value="Add" class="btn btn-info"style="width:100px" />
            </div>
        </form>

        </div>
        </div>

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
               <input class="form-control" type="text" name="class_name" id="class_name">
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

    $("#reponse_table").on("change","#etat", function () {
        console.log($(this).val());
       $.ajax({
            type: 'POST',
            url: "{{ url('get_etat_reponse') }}",
            data:  {'etat_value':$(this).val()}
        });
            var tab = $('#reponse_table').DataTable();
            $('#reponse_table tbody').on( 'click', 'tr', function () {
                var row= tab.row( this ).data();
                var id=row['id_rep'];
                console.log(id);
                $.ajax({
            type: 'POST',
            url: "{{ url('get_id_etat_reponse') }}",
            data:  {'id_rep':id}
        });
            });
    });
    $("#select_id").change(function(){
        //alert($('#select_id option:selected').val());
        $.ajax({
            type: 'POST',
            url: "{{ url('get_id_class') }}",
            data:  {'id_class':$('#select_id option:selected').val()}
           
        });

$('#student_table_post').DataTable({
   
        processing: true,
        serverSide: true,

        ajax: "{{ route('studentposts') }}",
      
        columns:[

            { data: "objet",name:"objet" },
            { data: "detail",name:"detail" },
            { data: "type",name:"objet" },
            { data: "id",name:"id",visible: false }         
        ],
        
        scrollY: "200px",
        scrollCollapse: true,
        paging:  false,
        bInfo : false,
        lengthChange: false,
        bDestroy: true
     });

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
         scrollY: "200px",
        scrollCollapse: true,
        paging:  false,
        bInfo : false,
        lengthChange: false,
        bDestroy: true
     });
     var times = [
	"true", 
	"false", 
	"..."
];
     var table = $('#student_table').DataTable();
    $('#student_table tbody').on( 'click', 'tr', function () {
            var row= table.row( this ).data();
            var id=row['id'];
            $(this).addClass("selected").siblings().removeClass("selected");
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
                   // ajax: "{{ route('reponse_get') }}",
                   ajax: "{{ route('reponse_get_test') }}",
                    columns:[
                          { data: "contenu",name:"contenu" },
                          { data: "username",name:"username" },
                          { data: "verification",name:"verification" },
                          { data: "id_rep",name:"id_rep",visible: false } ,
                          { render: function(d,t,r){
                                var $select = $("<select></select>", {
                                    "id":"etat",
                                    "value": d
                                });
                                $select.append('  <option selected="true" disabled="disabled">Choose</option>');
                                $.each(times, function(k,v){
                                    var $option = $("<option></option>", {
                                        "text": v,
                                        "value": v
                                    });
                                    if(d === v){
                                       // $option.attr("selected", "selected")
                                    }
                                    
                                    $select.append($option);
                                });
                                return $select.prop("outerHTML");
                            }
                        }   
            ],
           /* rowCallback: function (row, data) {
    var element = $(row).find('#etat');
    element.on("change", function () {
        alert($('#etat option:selected').val());
    });  
} ,*/
bFilter: false,
scrollCollapse: true,
lengthChange: false,
            scrollY: "500px",
           paging:  false,
        bInfo : false,
          
            bDestroy: true
        });
        });

        var table1 = $('#student_table_post').DataTable();
    $('#student_table_post tbody').on( 'click', 'tr', function () {

            var row= table1.row( this ).data();
            var id=row['id'];
            $(this).addClass("selected").siblings().removeClass("selected");
            //var seft_id="'"+id+"'";
            console.log(id );
             $.ajax({
                url: "{{ url('get_id_rep1') }}",
                type: "post",
                data:{'ID_pst':id}
                
                });

                $('#reponse_table').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: "{{ route('reponse_get1') }}",
                     columns:[
                          { data: "contenu",name:"contenu" },
                          { data: "username",name:"username" },
                          { data: "verification",name:"verification" },
                          { data: "id_rep",name:"id_rep",visible: false } ,
                          { render: function(d,t,r){
                                var $select = $("<select></select>", {
                                    "id":"etat",
                                    "value": d
                                });
                                $.each(times, function(k,v){
                                    var $option = $("<option></option>", {
                                        "text": v,
                                        "value": v
                                    });
                                    if(d === v){
                                        $option.attr("selected", "selected")

                                    }
                                    $select.append($option);
                                });
                                return $select.prop("outerHTML");
                            }
                        }   
            ],
                 bFilter: false,
           paging:  false,
        bInfo : false,
        scrollCollapse: true,
lengthChange: false,
            scrollY: "500px",
            bDestroy: true
                 
                
          
        });

        });
       $('#student_rep').on('submit', function(event){
       
    
    $('#form_output2').html('');
    $('#button_action2').val('insert');
    $('#action2').val('Add');
        event.preventDefault();
        var form_data = $(this).serialize();
        alert(form_data);
        $.ajax({
             type:'post',
            url:"{{ url('postrep') }}",
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
                    $('#form_output2').html(error_html);
                }
                else
                {
                    $('#form_output2').html(data.success);
                    $('#student_rep')[0].reset();
                    $('#action2').val('Add');
                    //$('.modal-title').text('Add Data');
                    $('#button_action2').val('insert');
                   // $('#student_table').DataTable().ajax.reload();
                }
            }
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