<?php

namespace App\Http\Controllers;
use App\Mail\ConfirmMail;
use App\Classe;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Etudiant;
use App\Prof;
use Session;
class EtudiantController extends Controller
{

    public function test_email(Request $request)
    {
        
        $is_etudiant = $request->session()->get('is_etudiant');
       // $is_prof = $request->session()->get('is_prof');
        $dom=$request->session()->get('domain');
        $domain="";
        $is_confirmed=false;
        $is_valid=false;
        $email = $request->input('email');
        $email2= $request->input('email_confirm');
        if(strcasecmp($email,$email2) == 0)
            {
                $is_confirmed=true;
            }
        if ($is_etudiant)
        {
            $domain='@edu.'.$dom;
            $test_em=strstr($email,$domain);
            if(strcasecmp($test_em,$domain) == 0)
            {
                $is_valid=true;
            }


        }  
        else if (!$is_etudiant)
        {
            $domain='@'.$dom;
            $test_em=strstr($email,$domain);
            if(strcasecmp($test_em,$domain) == 0)
            {
                $is_valid=true;
            }

        }  
        if($is_valid==false)
        {
            if ($is_etudiant)
            {
                echo 'le domain doit etre : @edu.'.$dom;
            }
            else if (!$is_etudiant)
            {
                echo 'le domain doit etre : '.$dom;
            }
        }
        if ($is_confirmed==false)
        {
            echo "email non confirmer";
        }
        if($is_valid==true && $is_confirmed==true )
        {
            $request->session()->put('email', $email);
           // $code=send_code($email);
             $verification_code = Hash::make(Str::random(8));
          
         $request->session()->put('code', $verification_code);
        
          Mail::to('rafapi9855@lerwfv.com')->send( new ConfirmMail($verification_code) );
           $isStudent=true;
            return view('final_register',['isStudent'=>$isStudent]);
        }

    }

    /*public function send_code($email)
    {
       // $verification_code = Hash::make(str_random(8));
        $verification_code = 123;
        //send this code to $email
        return $verification_code;
    }*/

    public function register(Request $request)
    {
        //check code verification
       $code= $request->input('code');
       $is_confirmed_code=false;
       if(strcasecmp($code,$request->session()->get('code')) == 0)
           {
               $is_confirmed_code=true;
           }

       $username= $request->input('username');
       $username_exist=true;
       if(!Etudiant::find($username))
       {
        $username_exist=false;
       }
       $password= $request->input('password');
       $confirm_password= $request->input('confirm_password');
       $is_confirmed=false;
        //verify password
        if(strcasecmp($password,$confirm_password) == 0)
            {
                $is_confirmed=true;
            }
             echo "viiii".$is_confirmed.$is_confirmed_code
            .$username_exist;
        //save in table Etudiant
        if($is_confirmed==true && $is_confirmed_code==true && $username_exist==false)
            {
                echo "yeees all is right ";
                $etd=new Etudiant();
                $etd->ID_univ=$request->session()->get('ID_univ'); 
                $etd->username=$username;
                $etd->email=$request->session()->get('email');
                $etd->password=$password;
                $etd->save();
                return view('welcome');            }
    
    }
    public function check_login(Request $request){

        $email=$request->input('email');
        $password=$request->input('password');

        $email_db = Etudiant::where('email', '=', $email)->first();
        $pswd_db = Etudiant::where('password', '=', $password)->first();

        $email_db_p = Prof::where('email', '=', $email)->first();
        $pswd_db_p = Prof::where('password', '=', $password)->first();

        $is_empty=false;
        if (empty($email) || empty($password)) { 
            $request->session()->put('error', 'remplir tous les champs');
            $is_empty=true;
            return view("welcome");
        }
        else
        {
            if($email_db === null || $pswd_db === null)
            {
                if($email_db_p === null || $pswd_db_p === null)
                {
                   // return back()->with('error', 'informations incorrectes');
                    $request->session()->put('error', 'informations incorrectes');
                    return view("welcome");
                }
                else
                {
                    $id_prof = Prof::where('email', $email)->where('password', $password)->first()->ID_prof;
                    $id_univ= Prof::where('email', $email)->where('password', $password)->first()->ID_univ;
                    $c_code= Classe::all()->where('ID_prof','=', $id_prof);
                   
                   // $c_code=substr($c_code,1);
                    //s$c_code= Classe::table('users')->get()

                    $request->session()->put('id_prf', $id_prof); 
                     $request->session()->put('id_univ', $id_univ);
                       
                    $pr_id=Prof::find($id_prof);
                    $prf_username=$pr_id['username'];
                     $request->session()->put('prf_username', $prf_username); 
                    return view("prof_int", ['namess' => $c_code]);
                }
                
            }
            else
            {
                $id_etd = Etudiant::where('email', $email)->where('password', $password)->first()->ID_etd;
                $request->session()->put('id_etd', $id_etd); 

                $et_id=Etudiant::find($id_etd);
                $etd_username=$et_id['username'];
                 $request->session()->put('etd_username', $etd_username); 

                 return redirect()->route('choix_class');
            }
        }
    }

    public function test_session (Request $request)
    {
        $value = $request->session()->get('ID_univ');
        return view('test_session')->with('value',$value);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
