<?php

namespace App\Http\Controllers;
use App\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PagesController extends Controller
{
   public function home(Request $request){
      
  
      $students=Student::Paginate(4);
      return view('students.index',compact('students'));
       
   }
}
