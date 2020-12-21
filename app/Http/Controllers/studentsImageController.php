<?php

namespace App\Http\Controllers;
use App\Student;
use App\Image;

use Illuminate\Http\Request;
use Flashy;
use Illuminate\Support\Facades\DB;

class studentsImageController extends Controller
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
    public function show(Student $student,Image $image)
    {
        
    
        return view('students.image.show',compact('student','image'));
        // dd('ggygfy');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id,Image $image)
    {
        $id=$image->id;
         $image=Image::findOrFail($id);
      

         return view('students.image.edit',compact('image'));

     
    //    dd('yes');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id,Image $image,Request $request )
    {
        //,Image $image,Student $student
        $id=$image->id;
        $image=Image::findOrFail($id);

        if($file=$request->file('picture')){
            $uid=@uniqid();
            $name=$uid.".".$file->getClientOriginalExtension();
           // n ap deplase image la nan folder images la ki nan system la
           if($file->move('images',$name)){
            //kounya nou pral insere nan tab student la 
        //update student  
       
         DB::table('images')->where('id',$image->id)->update(['image'=>$name]);
        return view('students.image.edit',compact('image'));
        // return redirect()->route('home');
         flash('Image change');

        }
    }

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
