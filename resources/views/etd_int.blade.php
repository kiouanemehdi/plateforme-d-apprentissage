<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
<meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="{{ URL::asset('css/etd_style.css') }}"/>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    
    <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js" defer ></script>
    <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js" defer ></script>       
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />


    <title>Document</title>
</head>
<body>
    <div class="grid-container">
        <div class="area1">
        <div class="header">
           <a  class="btn btn-primary" style="float: right;" href="logout">Logout</a>
           <H2>PLATFPORM</H2>
           
        </div>
        </div>
        <div class="area2">
            <div class="item1">
       <button id="add_student_post" class="btn btn-primary">+Add New Post</button>
           <div class="post" >
            <h4>Student post</h4>
        <table id="student_table_post" class="table table-bordered" width="400px">
                <thead>
                    <tr>
                        
                        <th>objet</th>
                        <th>detail</th>
                        <th>type</th>
                        <th style="display:none;">id</th>
                    </tr>
                </thead>
         </table><br>
         <h4>prof post</h4>
        <table id="student_table" class="table table-bordered" width="400px" >
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
        </div>
        <div class="item2">
             <div class="reponse">
        <table id="reponse_table" class="table " width="900px">
                    <thead>
                      
                        <tr>   
                           
                              <th>Id posts</th>
                              <th>Posts</th>
                              
                            
                        </tr>

                    </thead>

            </table>
               <div class="write_rep">
            <form method="POST" id="student_rep">
            <span id="form_output2"></span>
                <div class="form-group row">
                    
                    <div class="col-sm-10">
                    <textarea class="form-control" type="text" name="contenu" id="contenu"></textarea>
                    </div>
            </div>

            <input type="hidden" name="button_action2" id="button_action2" value="insert" />
         <input type="submit" name="submit" id="action2" value="Add" class="btn btn-info" />
            </form>

        </div>
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
                    <option>Help</option>
                    <option>note</option>
                    <option>vote</option>
                </select><br>
                </div>
           </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Topic</label>
                <div class="col-sm-10" id="topics" >
                <input type="radio" name="topic"  value="cours" >Cours  </input>
                <input type="radio" name="topic"  value="homework">Homework  </input>
                <input type="radio" name="topic"   value="exam">Exam  </input>
                <br>
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
              <div class="form-group row">
                <label class="col-sm-2 col-form-label">Visibility</label>
                <div class="col-sm-10">
                <select class="form-control" type="text" name="visibility" id="visibility">
                    <option>Demo user</option>
                    <option>Annonym to classmates</option>
                    <option>annoym to everyone</option>
                </select><br>
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
        ajax: "{{ route('postg_etd') }}",
        columns:[
            { data: "objet",name:"objet" },
            { data: "detail",name:"detail" },
            { data: "type",name:"objet" },
            { data: "id",name:"id",visible: false }         
        ],
         bInfo : false,
           lengthChange: false,
        bDestroy: true
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
         bInfo : false,
  lengthChange: false,
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

                        { data: "ID_etd",name:"ID_etd" } ,

                         { data: "contenu",name:"contenu" }           
            ],
          
            bFilter: false,
            lengthChange: false,
            bDestroy: true
        });
        });

        var table1 = $('#student_table_post').DataTable();
    $('#student_table_post tbody').on( 'click', 'tr', function () {
            var row= table1.row( this ).data();
            var id=row['id'];
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
                           { data: "ID_etd",name:"ID_etd" } ,
                          { data: "contenu",name:"contenu" }     
                          
                   
            ],
            bInfo : false,
            bPaginate: false,
             bFilter: false,
             lengthChange: false,
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
   /* $('#student_table').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('postg') }}",
        columns:[
            { data: "objet",name:"objet" },
            { data: "detail",name:"detail" },
            { data: "type",name:"objet" },
            { data: "id",name:"id",visible: false }         
        ]
     });
    var table = $('#student_table').DataTable();
    $('#student_table tbody').on( 'click', 'tr', function () {
            var row= table.row( this ).data();
            var id=row['id'];
            //var seft_id="'"+id+"'";
            //console.log(id );
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
        });*/
/*NEW POST FORM DATA SHOW*/
  $('#add_student_post').click(function(){
    $('#studentModal').modal('show');
        $('#student_form')[0].reset();
        $('#form_output').html('');
        $('#button_action').val('insert');
        $('#action').val('Add');
  }); 
  /*SUBMIT FORM DATA PROCESSING*/
 $('#student_form').on('submit',function(event){
        event.preventDefault();
        //FORM_DATA VARIABLE WILL HOLD ALL FORM INPUT VALUES ALSO THE TOKEN KEY
        var form_data = $(this).serialize();
        alert( form_data);
       $.ajax({
            type:'post',
            url:"{{ url('sposts') }}",
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
                   // $('#student_table').DataTable().ajax.reload();s
                }
            }
        });
    });
 window.history.forward();
 </script>   
</body>
</html>