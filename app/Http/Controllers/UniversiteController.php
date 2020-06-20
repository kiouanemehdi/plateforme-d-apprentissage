<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Universite;


use Session;
class UniversiteController extends Controller
{
     
    public function get_univ(Request $request)
    {
        
        //Session::flush();
       // if (!$request->session()->exists('is_etudiant'))
        //{
            switch ($request->input('type')) {
                case 'etd':
                    $request->session()->put('is_etudiant', true);
                    break;
        
                case 'prf':
                    $request->session()->put('is_etudiant', false);
                    break;
                }
         /*    $request->session()->put('is_etudiant', false); 
            $request->session()->put('is_prof', false);
           if($request->submit == "etudiant")
            {
            $request->session()->put('is_etudiant', true); 
             }
            else if($request->submit == "prof")
            {
            $request->session()->put('is_prof', true); 
            } 
       // }
       else 
        {
            \Session::forget('is_etudiant') ;
            if($request->submit == "etudiant")
            {
            $request->session()->put('is_etudiant', true); 
             }
            else if($request->submit == "prof")
            {
            $request->session()->put('is_etudiant', false); 
            } 
        }*/
        

        $univs=Universite::all();
        return view('univ',['univs'=>$univs]);

    }
    public function get_domain(Request $request)
    {
        $id = $request->input('domain');
        $request->session()->put('ID_univ', $id); 
        $univ_id=Universite::find($id);
        $domain=$univ_id['domain'];
        $request->session()->put('domain', $domain); 
         $request->session()->put('error-mail', 'false');
         $isStudent=$request->session()->get('is_etudiant');
        return view('email',["isStudent"=>$isStudent]);
        // $domain=Universite::select('domain')->where('ID_univ', $id)->get();
      //  $comments = Comment::where('user_id', $id)->orderBy('id', 'desc')->get();

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
