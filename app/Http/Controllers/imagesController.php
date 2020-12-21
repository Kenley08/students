<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\image;
use App\Student;
use Flashy;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
class imagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
     

        // return DB::table('images')->latest('studentId');

        return  Image::latest()->where('studentId',14)->first();

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('imaj.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        //n ap stocke si session yo egziste 
        $nom=$request->session()->get('nom');
        $prenom=$request->session()->get('prenom');
        $sexe=$request->session()->get('sexe');
        $telephone=$request->session()->get('telephone');
        $email=$request->session()->get('email');

        // if(isset($firstname))
        if($nom && $prenom && $sexe && $telephone && $email){
            // dd('li bon');
            //nou pral insere nan baz de donne a 
            //avan tou nou pral gade  si fichier image la upload 
                    if($file=$request->file('picture')){
                    $uid=@uniqid();
                    $name=$uid.".".$file->getClientOriginalExtension();
                    //kounya nou pral insere kounya
                    // n ap deplase image la nan folder images la ki nan system la
                    if($file->move('images',$name)){
                        //kounya nou pral insere nan tab student la 
                    //insert into student  
                    $idstudent=time();
                    $student=Student::create([
                        'id'=>$idstudent,
                        'nom'=>$nom,
                         'prenom'=>$prenom,
                         'sexe'=>$sexe,
                         'telephone'=>$sexe,
                         'email'=>$email]
                         );
     
                         
                    // $student=new Student;
                    // $student->nom=$nom;
                    // $student->prenom=$prenom;
                    // $student->sexe=$sexe;
                    // $student->telephone=$telephone;
                    // $student->email=$email;
                    // $student->save();
                    
                    //nou pral insere nan table images la
                    $img=image::create([
                        'image'=>$name,
                        'studentId'=>$idstudent]
                        );

                        if($img && $student){
                            flash ('etudiant ajoute avec succes');   
                        return redirect()->route('home');
                        }
                

                    }

                 }
          }else{
           flash('li pa bon');
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
