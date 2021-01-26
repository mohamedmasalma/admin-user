<?php

namespace App\Http\Controllers\user\content;

use Illuminate\Http\Request;
use App\profile;
use App\user;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
class accountController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
          // $this->middleware('admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */

function profile(){
    return view('user.accounts.profile');
}
  
function subscription(){
    $user = new user;
    $paid = $user->find(Auth::user()->id)->paid;
    return view('user.accounts.subscription',compact('paid'));
}
function storeprofile(Request $request){
    if($request->f_name == '' || $request->l_name == '' || $request->contact_name == '' || $request->alternate_number == ''){
        session()->flash('error', 'dont leave any plank field please!!');
        return redirect('user/accounts/profile');
}
if(!preg_match("/^[0-9]{10}$/", $request->contact_name) ) {
       session()->flash('error', 'phone number is not valid !!');
        return redirect('user/accounts/profile');
}
if(!preg_match("/^[0-9]{10}$/", $request->alternate_number) ) {
       session()->flash('error', 'alternate number is not valid !!');
        return redirect('user/accounts/profile');
}

 $id=Auth::user()->id;
 $update=Auth::user()->profile->where('user_id',$id)->first();

$update->f_name=$request->f_name;
$update->l_name=$request->l_name;
$update->contact_name=$request->contact_name;
$update->alternate_number=$request->alternate_number;
$update->user_id=Auth::user()->id;
$update->save();
session()->flash('done', 'profile has updated!!');

return redirect('user/accounts/profile');


}




}
