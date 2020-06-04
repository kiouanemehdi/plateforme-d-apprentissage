<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use App\Mail\ConfirmMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Prof;
use Session;
use Auth;

class ProfController extends Controller
{

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
       $username_exist=false;
       
       $password= $request->input('password');
       $confirm_password= $request->input('confirm_password');
       $is_confirmed=false;
        //verify password
        if(strcasecmp($password,$confirm_password) == 0)
            {
                $is_confirmed=true;
            }
           //  echo "viiii".$is_confirmed.$is_confirmed_code
          //  .$username_exist;
        //save in table Etudiant
        if($is_confirmed==true && $is_confirmed_code==true && $username_exist==false)
            {
                echo "yeees all is right ";
                $etd=new Prof();
                $etd->ID_univ=$request->session()->get('ID_univ'); 
                $etd->username=$username;
                $etd->email=$request->session()->get('email');
                $etd->password=$password;
                $etd->save();
            }
           // return view('login');
    }

    public function logout( )
    {


     //  Session::forget('id_prf');
          //  Session::pull('id_prf');     
          //Session::flash('id_prf', 'logout');
        //Session::flush();

        return view('welcome');
              
Session::regenerate(true);
         Session::flush(); return redirect('/');
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
  public function test_email(Request $request)
    {
        
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
        
            $domain='@'.$dom;
            $test_em=strstr($email,$domain);
            if(strcasecmp($test_em,$domain) == 0)
            {
                $is_valid=true;
            }


       
       
        if($is_valid==false)
        {
              echo 'le domain doit etre : @'.$dom;           
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
          $isStudent=false;
            return view('final_register',["isStudent"=>$isStudent]);
        }

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
