<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;
use App\Course;
use App\courseStudent;
use App\Image;
use Illuminate\Support\Facades\DB;

use Flashy;
use Illuminate\Support\Facades\Redirect;



class studentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
   

    // $students=Student::Paginate(2);
    $students=Student::All(4);
    return view('students.index',compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $student=new Student;
        return view('students.create',compact('student'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, student $student)
    {
        // //n ap teste validation a anvan nou insere
        // $this->validate($request,[
        //     'nom'=>'required|min:4|regex:/^[a-zA-Z\s]+$/',
        //     'prenom'=>'required|min:4|regex:/^[a-zA-Z\s]+$/',
        //     'telephone'=>'required|min:8|unique:students,telephone',
        //     'email'=>'unique:students,email']);
            //    $uidimg=time();
      


       //nou ap insere session yo nan yon varyab
       //session nom 
         $request->session()->put('nom',$request->input('nom'));
         //session prenom
         $request->session()->put('prenom',$request->input('prenom'));
         //session sexe
         $request->session()->put('sexe',$request->input('sexe'));
         //session  telephone
         $request->session()->put('telephone',$request->input('telephone'));
         //session email
         $request->session()->put('email',$request->input('email'));




                //  flash ('Etudiant ajoute avec succes');
                //nou pase session yo nan view crate imaj la
                return view('imaj.create')->with('firstname',$request->session()->get('nom'))
                ->with('lastname',$request->session()->get('prenom'))
                ->with('sex',$request->session()->get('sexe'))
                ->with('phone',$request->session()->get('telephone'))
                ->with('imel',$request->session()->get('email'));

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    // public function show($id)
    public function show(Student $student)
    {
       

        //nou pral fe yon jointure pou nou ka pran cours ke etidyan poko pran deja nan baz la
        //   $image=DB::table('images')
        //  ->join('students')
        // ->select('images.image')
        //  ->where('images.studentId','')
        //  ->get();
        $courses=Course::All();
        return view('students.show',compact('student','courses'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function edit($id)
    public function edit(Student $student)
    {
        $image=Image::latest()->where('studentId',$student->id)->first();
        // $student=Student::findOrFail($id);
        return view('students.edit',compact('student','image'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id )
    {
          //n ap teste validation a anvan nou insere
          $this->validate($request,[
            'nom'=>'required|min:4|alpha',
            'prenom'=>'required|min:4|alpha',
            'telephone'=>'required|min:8']);

            $student=Student::findOrFail($id);
            $student->update([
           'nom'=>$request->nom,
            'prenom'=>$request->prenom,
            'sexe'=>$request->sexe,
            'telephone'=>$request->telephone,
            'email'=>$request->email]
            );
            flash("Etudiant modifie avec succes");
           return redirect()->route('students.show',$id);
         
     }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function destroy($id)
    public function destroy(Student $student)
    {
        // Student::destroy($id);
        $student->delete();
         flash("Etudiant  ".$student->nom. " supprime avec succes");
        // session()->flash('notification.type','danger');
        return redirect()->route('home');
    }
}
