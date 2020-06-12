<?php

namespace App\Http\Controllers;

use Validator;
use Illuminate\Http\Request;
use App\Post;
use App\Classe;
use Carbon\Carbon;
use DataTables;
class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       /* if(request()->ajax())
        {
            return datatables()->of(Post::latest()->get())->make(true);
        }
        return view('prof_int');*/
    }
    public function get_id_class(Request $request)
    {
        $request->session()->put('id_class', $request->get( 'id_class' ));
    }
    public function get_post(Request $request)
    {
       
        $students  = Post::select('ID_post','objet','detail','type')
        ->where('ID_prof','=',$request->session()->get('id_prf'))
        ->where('ID_class','=', $request->session()->get('id_class'))
        ->orderBy('date', 'DESC');

        return DataTables::of($students )
        ->addColumn('id', function($students){
            return $students->ID_post;
        })
        ->make(true);
    }
    public function postpost(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'type' => 'required',
            'objet'  => 'required',
            'detail'  => 'required',
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
                $student = new Post([
                    'ID_prof'     =>   $request->session()->get('id_prf'),
                    'ID_class' =>  $request->session()->get('id_class'),
                    'objet'     =>  $request->get('objet'),
                    'detail'     =>  $request->get('detail'),
                    'type'    =>  $request->get('type'),
                    'date'    => Carbon::now() /*'2020-06-03 17:15:10'*/
                ]);
                $student->save();
                $success_output = '<div class="alert alert-success">Post creer</div>';
            }
        }
        $output = array(
            'error'     =>  $error_array,
            'success'   =>  $success_output
        );
        echo json_encode($output);
    }
    //STUDENT STUFF
    public function studentPost(Request $request){

        $validation = Validator::make($request->all(), [
            'type' => 'required',
            'objet'  => 'required',
            'detail'  => 'required',
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
                $student = new Post([
                    'ID_prof'     => $request->session()->get('id_prf'),
                    
                    'objet'     =>  $request->get('objet'),
                    'detail'     =>  $request->get('detail'),
                    'type'    =>  $request->get('type'),
                    'date'    => Carbon::now() /*'2020-06-03 17:15:10'*/
                ]);
                $student->save();
                $success_output = '<div class="alert alert-success">Post creer</div>';
            }
        }
        $output = array(
            'error'     =>  $error_array,
            'success'   =>  $success_output
        );
        echo json_encode($output);

    }
    public function get_post_etd(Request $request)
    {
       
        $students  = Post::select('ID_post','objet','detail','type')
        //->where('ID_prof','=',$request->session()->get('id_prf'))
        ->where('ID_class','=', $request->session()->get('id_selected_class'))
        ->orderBy('date', 'DESC');

        return DataTables::of($students )
        ->addColumn('id', function($students){
            return $students->ID_post;
        })
        ->make(true);
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
