<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Course;



class coursesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courses=Course::All();
        return view('courses.index',compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $course=new course;
        return view('courses.create',compact('course'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         //n ap teste validation a anvan nou insere
         $this->validate($request,[
            'nom'=>'required
            |unique:courses,nom']);

            Course::create([
           'nom'=>$request->nom]
            );
             flash('Cours ajoute avec succes');

            return redirect()->route('courses.index');
          // return Redirect::route('home');
        //    return Redirect::home();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $course=Course::findOrFail($id);
        return view('courses.show',compact('course'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $course=Course::FindOrFail($id);
        return view('courses.edit',compact('course'));

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

        //n ap teste validation a anvan nou update
        $this->validate($request,[
            'nom'=>'required']);
            
            $course=Course::findOrFail($id);
         
            $course->update([
           'nom'=>$request->nom]
            );
             flash('Cours Modifie avec succes');

            return redirect()->route('courses.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Course::destroy($id);
        // $student->delete();
         flash("Cours supprime avec succes");
        // session()->flash('notification.type','danger');
        return redirect()->route('home');
    }
}
