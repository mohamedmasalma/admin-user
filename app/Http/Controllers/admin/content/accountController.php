<?php

namespace App\Http\Controllers\admin\content;

use Illuminate\Http\Request;
use App\profile;
use App\user;
use Illuminate\Support\Facades\Auth;
class accountController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
          // $this->middleware('admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */

function profile(){
    return view('admin.accounts.profile');
}
  

function subscription(){
 
    return view('admin.accounts.subscription');
}
function storeprofile(Request $request){
  if($request->f_name ==''|| $request->l_name ==''|| $request->contact_name ==''||$request->alternate_number =='' ){
    session()->flash('error', 'dont leav any planck field please');

     return redirect('accounts/profile');
  }
if(!preg_match("/^[0-9]{10}$/", $request->contact_name) ) {
       session()->flash('error', 'phone number is not valid !!');
        return redirect('accounts/profile');
}
if(!preg_match("/^[0-9]{10}$/", $request->alternate_number) ) {
       session()->flash('error', 'alternate number is not valid !!');
        return redirect('accounts/profile');
}
 $id=Auth::user()->id;
 $model= new profile;
 $update= $model->where('admin_id',$id)->first();

$update->f_name=$request->f_name;
$update->l_name=$request->l_name;
$update->contact_name=$request->contact_name;
$update->alternate_number=$request->alternate_number;
$update->save();
 session()->flash('update', 'Profile Was Updated');

return redirect('accounts/profile');


}




}
