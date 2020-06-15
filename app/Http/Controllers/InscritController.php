<?php

namespace App\Http\Controllers;
use Validator;
use Illuminate\Http\Request;
use App\Classe;
use App\Inscrit;
use DB;
use Carbon\Carbon;
use Session;
use DataTables;
class InscritController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }
    public function get_id_new_class(Request $request)
    {
        $request->session()->put('id_new_class',$request->get('id_new_class'));
    }
    public function check_class_code(Request $request){
        $validation = Validator::make($request->all(), [
           'etd_code' => 'required',
       
       ]);

       $error_array = array();
       $success_output = '';
       if ($validation->fails())
       {
           foreach($validation->messages()->getMessages() as $field_name => $messages)
           {
               $error_array[] = $messages;
           }
       }
       else
       {
           if($request->get('button_action') == "insert")
           {
               //is the code is correct
               $code=Classe::where('ID_class', '=',$request->session()->get('id_new_class'))
               ->first()->code;
               
               if($code== $request->get('etd_code'))
               {
               $student = new Inscrit([
                   'ID_etd' => $request->session()->get('id_etd'),
                   'ID_class' => $request->session()->get('id_new_class'),
     
                   'date_inscription' => Carbon::now() /*'2020-06-03 17:15:10'*/
               ]);
               $student->save();
               $success_output = '<div class="alert alert-success">code correcte</div>';
               }
               else
               $success_output = '<div class="alert alert-danger">code incorrecte </div>';
           }
       }
       $output = array(
           'error'     =>  $error_array,
           'success'   =>  $success_output
       );
       echo json_encode($output);
   }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
