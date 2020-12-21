<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\courseStudent;
use App\Student;
use App\course;
use Illuminate\Support\Facades\DB;
use Flashy;

class studentsCourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Student $student)
    {
        // $id=$student->id;
        // $coursesStudent=courseStudent::where('studentId',$student->id)->join('students','students.id','course_students.studentId')->select('students.*')->get();
        // return view('students.courses.index',compact('coursesStudent'));

        //nou fe yon re4ket k ap vini ak tout kou ke elev sa ap suiv
         $coursesStudent=DB::table('course_students')->join('students','students.id','course_students.studentId')
         ->join('courses','courses.id','course_students.courseId')
         ->select('courses.nom','course_students.courseId','students.email')->where('studentId',$student->id)->get();
        return view('students.courses.index',compact('coursesStudent','student'));
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
    public function store(Request $request,Student $student)
    {
        $studentId=$student->id;
        $courseName=$request->courseName;
      
    $course=DB::table('course_students')->where('courseId', $courseName)->where('studentId', $studentId)->first();

         if($course!=null){
            flash ("l'etudiant a deja pris ce cours ");
               return redirect()->route('students.show',compact('student'));
      }
        else{
        //     flash('pa jwenn');
            
            courseStudent::create([
                'courseId'=>$request->courseName,
                'studentId'=>$student->id]
                 );
                 return redirect()->route('students.courses.index',compact('student','course'));
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
    public function destroy(student $student,course $course)
    {
         DB::delete('delete from course_students where studentId=? and courseId=?',[$student->id,$course->id]);
        flash("Cours retire avec succes");
       return redirect()->route('home');
    }
}
