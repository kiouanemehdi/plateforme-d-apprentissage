<?php

namespace App\Http\Controllers;
use Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Reponse;
use Carbon\Carbon;
use DataTables;
use Session;
class ReponseController extends Controller
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
     public function get_etat_reponse(Request $request)
    {
        $request->session()->put('etat_value',$request->get('etat_value'));
        Reponse::where(['ID_reponse' => $request->session()->get('id_rep')])->update(['verification' => $request->get('etat_value')]);
 
        
    }

    public function get_id_etat_reponse(Request $request)
    {
      $request->session()->put('id_rep',$request->get('id_rep'));
    }

   
    public function get_id_rep(Request $request)
    {
        if(session::has('koupa1'))
      {  $request->session()->put('koupa1',null);}
        
        $request->session()->put('koupa', $request->get( 'ID_pst' ));
    }
    public function get_reponse(Request $request)
    {
      // $students  = Reponse::select('contenu','ID_etd')->where('ID_post','=',$request->session()->get('koupa'))->orderBy('date', 'DESC');
  //return DataTables::of($students )->make(true);
  $usersz = DB::table('reponses')
  ->join('etudiants', 'reponses.ID_etd', '=', 'etudiants.ID_etd')
  ->select('contenu', 'username','verification')->where('ID_post','=',$request->session()->get('koupa'))->orderBy('date', 'DESC');
          return DataTables::of($usersz)->make(true);
    }

    public function get_reponse_test(Request $request)
    {
      // $students  = Reponse::select('contenu','ID_etd')->where('ID_post','=',$request->session()->get('koupa'))->orderBy('date', 'DESC');
  //return DataTables::of($students )->make(true);
  $usersz = DB::table('reponses')
  ->join('etudiants', 'reponses.ID_etd', '=', 'etudiants.ID_etd')
  ->select('ID_reponse','contenu', 'username','verification')->where('ID_post','=',$request->session()->get('koupa'))->orderBy('date', 'DESC');
          return DataTables::of($usersz)
          ->addColumn('id_rep', function($usersz){
            return $usersz->ID_reponse;
        })
          ->addColumn('verification_choix', function(){
            return '';
        })->make(true);
    }

    public function get_id_rep1(Request $request)
    {
        if(session::has('koupa'))
       { $request->session()->put('koupa',null);}
        
        $request->session()->put('koupa1', $request->get( 'ID_pst' ));
    }
    public function get_reponse1(Request $request)
    {
       /* $students  = Reponse::select('contenu','ID_etd')->where('ID_post_etd','=',$request->session()->get('koupa1'))->orderBy('date', 'DESC');*/
        $usersz = DB::table('reponses')
            ->join('etudiants', 'reponses.ID_etd', '=', 'etudiants.ID_etd')
            ->select('contenu', 'username','verification')->where('ID_post_etd','=',$request->session()->get('koupa1'))->orderBy('date', 'DESC');
                    return DataTables::of($usersz)->make(true);
    }


    public function post_rep(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'contenu' => 'required',

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
            if($request->get('button_action2') == "insert")
            {
                $student = new Reponse([
                    'ID_prof'     => null,
                    'ID_post'     => $request->session()->get('koupa'),
                    'ID_post_etd'     => $request->session()->get('koupa1'),
                    'ID_etd'     =>   $request->session()->get('id_etd'),
                    'contenu'     =>  $request->get('contenu'),
                    'verification'     => '...',
                    'date'    => Carbon::now() /*'2020-06-03 17:15:10'*/
                ]);
                $student->save();
                $success_output = '<div class="alert alert-success">rep creer</div>';
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
