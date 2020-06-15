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
        $students  = Classe::select('code')->where('ID_prof','=',$request->session()->get('id_prf'))->orderBy('date_creation', 'DESC');
        return DataTables::of($students );

    }
    public function addNewClass(Request $request){
         $validation = Validator::make($request->all(), [
            'class_name' => 'required',
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
                    'ID_univ' => $request->session()->get('id_univ'),
                    'ID_prof' => $request->session()->get('id_prf'),
                    'ID_sem'=> $request->get('class_semestre') ,
                    
                    'code' => $request->get('class_code'),
                    'class_name' => $request->get('class_name'),
                    'date_creation' => Carbon::now() /*'2020-06-03 17:15:10'*/
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

    public function get_choix_class(Request $request){
       
        $inscrit_class = DB::table('inscrits')
        ->join('classes', function ($join) {
            $id_etd=Session::get('id_etd');
            $join->on('inscrits.ID_class', '=', 'classes.ID_class')
                 ->where('inscrits.ID_etd', '=',$id_etd);
        })
        ->select('classes.ID_class','classes.class_name')
        ->get();

       // $std_univ=Etudiant::select('ID_univ')->where('ID_etd','=','1')->first()->ID_univ;
        $other_class = DB::table('classes')
        ->join('etudiants', function ($join) {
            $id_etd=Session::get('id_etd');
            $join->on('etudiants.ID_univ', '=', 'classes.ID_univ')
                 ->where('etudiants.ID_etd', '=', $id_etd)
                 ->whereNotIn('classes.ID_class', Inscrit::select('ID_class')->where('ID_etd','=',$id_etd));
        })
        ->select('classes.ID_class','classes.class_name')
        ->get();

            return view('choix_class',['class_inscrit'=>$inscrit_class,'class_others'=>$other_class]);

    }
    public function redirect_int(Request $request)
    {
        $idc=$request->input('inscrit_class');
        $request->session()->put('id_selected_class',$idc);
        return view('etd_int');
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
