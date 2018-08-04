<?php

namespace App\Http\Controllers\Auth;

use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

use Illuminate\Contracts\Auth\Guard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Support\Facades\Input;
use App\HTTP\Requests;
use Illuminate\Support\Facades\File;

use App\User;
use DB;
use Hash;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

  //  use AuthenticatesAndRegistersUsers, ThrottlesLogins;
   // use AuthenticatesAndRegistersUsers;

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
 //   public function __construct(){
   //     $this->middleware('guest', ['except' => 'getLogout']);
   // }
  

    public function __construct(Guard $auth)
    {
         $this->auth = $auth;
         $this->middleware('guest', ['except' => 'getLogout']);

      
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
   


//login

       protected function getLogin()
    {
        return view('auth.login');
    }


       


        public function postLogin(Request $request)
          {
        // dd($request);
       
            $this->validate($request, [
            'email' => 'required',
            'password' => 'required',
             ]
            );
                $credentials = $request->only('email', 'password');
                   if ($this->auth->attempt($credentials, $request->has('remember')))
                         { 
                        
                               return redirect('bienvenida');
                  
                         }else{
                             return redirect('login')->with('msjs',"email o contraseña incorrectos");
                                   
                        } 
           
          }

          // Register
          public function register(){return view('auth.register'); 
      }

    //post Request $request
      public function postregister(Request $request){
          //dd($request);
       

       $user = new User;
       $user->nombre=$request->get('nombre');
       $user->apellido=$request->get('apellido');
       $user->email=$request->get('email');
       $user->password=bcrypt($request->get('password'));

       if ($request->hasFile('foto')) {
                $dir          = 'uploads/';
                $extension    = strtolower($request->file('foto')->getClientOriginalExtension()); // get image extension
                $fileName     = str_random() . '.' . $extension; // rename image
                $request->file('foto')->move($dir, $fileName);
                $user->foto   = $fileName;
            }else{
            return redirect('register')->with('msjs',"No se guardaron los datos");              
            }
            $user->save();
            return redirect('login')->with('msjs',"Se guardaron los datos");              
      }






//salir

protected function getLogout()
    {
          $this->auth->logout();
        return redirect('login')->with('msjs',"saliste");              
    }




}
