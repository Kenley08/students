<?php

namespace App\Http\Controllers;
// use App\Http\Requests\contactRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\MailAccountCreated;
use Illuminate\Support\Facades\DB;
use App\User;
use Flashy;
use App\Student;
use Illuminate\Support\Facades\Redirect;





class accountController extends Controller
{     
    
    public function home(Request $request){
      
        return view('account.login.index');
         
     }
    //fonction qui c
    public function create(Request $request)
    {
        $etat=$request->session()->get('etat');
        $email=$request->session()->get('email');
      //update etat uti a
      DB::table('users')->where('email',$email)->update(['etat'=>0]);
       return view('account.create');
    }
    //nou kreye yon request ki pote on contactRequest ki se yon klass k ap jere validationinput form yo
    public function store(Request $request)
    {
       //n ap teste validation a avan nou insere a  
      $this->validate($request,[
         'name'=>'min:4|regex:/^[a-zA-Z\s]*$/',
         'password'=>'min:8']);
       //noou pral insere
       //pou ou fe sa nou pral kreye yon objet de contactMessage ke nou te kreye se class sa k ap akapsile mail la pou  ka ale
       $maillable=new MailAccountCreated($request->name,$request->email,$request->pass);
       $request->session()->put('name',$request->name);
       $request->session()->put('email',$request->email);
       $request->session()->put('pass',$request->pass);

       //nou voye mail la ale avek facades mail la
       Mail::to($request->email)->send($maillable);
        $kod=$request->session()->get('kod');
        $mesaj="";
        //nou kenbe session a nan yon varyab
        return view('account.verify.index',compact('kod','mesaj'));

    }

    //fontion pour vefifier le code envoye dans l'email
    public function verify(request $request){
        //mwen k apt ekod ki jerere a nan yon sesyon pou m ka fe tes la ave l
        $kod=$request->session()->get('kod');

        $name=$request->session()->get('name');
        $email=$request->session()->get('email');
        $pass=$request->session()->get('pass');

         if($request->code==$kod){
          
            //save User
            $user=new User;
            $user->name=$name;
            $user->email=$email;
            $user->password=$pass;
            $user->code_verified=1;
            $user->etat=1;
            $user->save();


             // n ap insere nan baz la

            //  User::create([
            //     'name'=>$name,
            //     'email'=>$email,
            //     'password'=>$pass,
            //     'code_verified'=>1,
            //     'etat'=>1,
            //      ]);

                // flash('');
            // nou retoutounen paj akey la
           
            //add etat,email in session
            $request->session()->put('etat',$user->etat);
            $request->session()->put('email',$user->email);
             return redirect()->route('home');
         }else{
            $mesaj="le code de confirmation n'est pas valide";
            return view('account.verify.index',compact('kod','mesaj'));
            // return "le code de confirmation n'est pas valide";
          
         }
       
    }

    //fonction pour login
    
    public function login(Request $request){

      
    
        // nou pral fe recherch pou nou ka get user identification a
     $user = User::where([
        'name' => $request->name,
        'password' => $request->pass,
    ])->get();
       
        // echo $user[0]->id;
        //nou pral fe test indentifiant la avan nou return view home la
            if(isset($user[0]->id)){
            // //on met l'id de l'uti dans une session
            $request->session()->put('id',$user[0]->id);
            //on capte l'id
            $id=$request->session()->get('id');
            //update etat utilisateur
            DB::table('users')->where('id','=',$id)->update(['etat'=>1]);
            //return view home
            $students=Student::Paginate(4);
            return view('students.index',compact('students'));
         }else {
                $mesaj="les identifiants ne correspondent pas";
                return view('account.login.index',compact('mesaj'));

         }

       
         
     }

     //function pour deconnecter un utilisateur
     public function logout(Request $request){
            $id=$request->session()->get('id');
            DB::table('users')->where('id','=',$id)->update(['etat'=>0]);
            return view('account.login.index');
     }
}
