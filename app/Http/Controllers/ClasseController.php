<?php

namespace App\Http\Controllers;
use Validator;
use App\Classe;
use Carbon\Carbon;
use Illuminate\Http\Request;
use DataTables;
class ClasseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }
    public function get_classes(Request $request){
        $students  = Classe::select('code')->where('ID_prof','=',$request->session()->get('id_prf'))->orderBy('date', 'DESC');
        return DataTables::of($students );

    }
    public function addNewClass(Request $request){
         $validation = Validator::make($request->all(), [
            'class-name' => 'required',
            'class_code'  => 'required',
           
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
            if($request->get('class_button_action') == "insert")
            {
                $student = new Classe([
                    'ID_univ' =>$request->session()->get('id_univ'),
                    'ID_prof'     => $request->session()->get('id_prf'),
                    'ID_sem' =>   $request->get('class_semestre') ,
                    'code'     =>  $request->get('class_code'),
                    'date_creation'    => Carbon::now() /*'2020-06-03 17:15:10'*/
                ]);
                $student->save();
                $success_output = '<div class="alert alert-success">class creer</div>';
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
