<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Mail;
use App\Mail\vertifyEmail;
use Session;


class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = 'user/dashboard/campaign';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:191',
            'l_name' => 'required|string|max:191',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data )
    {  
           
      
      
         $user= User::create([
            'name' => $data['name'],
            'l_name' => $data['l_name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'vertifyToken'=> Str::random(40),
        ]);
     
       // $thisuser=User::findOrFail($user->id);
       // $this->sendEmail($thisuser);

        return $user;
    }

public function sendEmail($thisuser){
    Mail::to($thisuser['email'])->send(new vertifyEmail($thisuser));

       
}



   public function sendEmailDone($mail, $token){
    $user = User::where(['email'=>$mail,'vertifyToken'=>$token])->first();
    if($user){
        User::where(['email'=>$mail,'vertifyToken'=>$token])->update(['status'=>'1','vertifyToken'=>NULL]);

       $this->guard()->login($user);
        return redirect('login');

  
    } 
    else {return 'erooor';}

   }

}