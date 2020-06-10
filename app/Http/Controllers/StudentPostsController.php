<?php

namespace App\Http\Controllers;

use App\StudentPosts;
use Illuminate\Http\Request;

use Validator;
use Carbon\Carbon;
use DataTables;

class StudentPostsController extends Controller
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
     public function get_post(Request $request)
    {
        $students  = StudentPosts::select('ID_post','objet','detail','type')->where('ID_etd','=',$request->session()->get('id_etd'))->orderBy('date', 'DESC');
        return DataTables::of($students )
        ->addColumn('id', function($students){
            return $students->ID_post;
        })
        ->make(true);
    }
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
                $student_post = new StudentPosts([
                    'ID_etd'     =>   $request->session()->get('id_etd'),
                     'type'    =>  $request->get('type'),
                    'topic'     =>  $request->get('topic'),
                    'objet'     =>  $request->get('objet'),
                    'detail'     =>  $request->get('detail'),
                    'visibility'     =>  $request->get('visibility'),
                   
                    'date'    => Carbon::now() /*'2020-06-03 17:15:10'*/
                ]);
                $student_post->save();
                $success_output = '<div class="alert alert-success">Post creer</div>';
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
     * @param  \App\StudentPosts  $studentPosts
     * @return \Illuminate\Http\Response
     */
    public function show(StudentPosts $studentPosts)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\StudentPosts  $studentPosts
     * @return \Illuminate\Http\Response
     */
    public function edit(StudentPosts $studentPosts)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\StudentPosts  $studentPosts
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, StudentPosts $studentPosts)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\StudentPosts  $studentPosts
     * @return \Illuminate\Http\Response
     */
    public function destroy(StudentPosts $studentPosts)
    {
        //
    }
}
