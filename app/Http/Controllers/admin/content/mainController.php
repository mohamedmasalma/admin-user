<?php

namespace App\Http\Controllers\admin\content;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\campaign;
use App\profile;
use App\User;
class mainController extends Controller
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

function showCustomer(){
    $user = new profile;
    $users=$user->whereNull('admin_id')->get();
    

    return view('admin.admin.customer',compact('users'));
}
  
 function showcamp(){
  $camp=new campaign;
  $user=new user;
  $all = $camp->whereNull('admin_id')->get();

    
    return view('admin.admin.campaigns',compact('all','user'));
       
}


function EditCamp(Request $request){
   


if($request->time_zone==''){
   session()->flash('error', 'please dont forget the time zone..!!!');
  return redirect('admin/campaign');}
  if($request->camp_name=='' ){
   session()->flash('error', ' name is required..!!!');
  return redirect('admin/campaign');
}
if($request->camp_date=='' ){
   session()->flash('error', 'date is required..!!!');
  return redirect('admin/campaign');
}
if($request->camp_start=='' ){
   session()->flash('error', 'start time is required..!!!');
  return redirect('admin/campaign');
}  

    $chanels='' ;
if( $request->edit_voice=='on'){$chanels=$chanels.'RVM';if( $request->edit_sms=='on'){$chanels=$chanels.',SMS';}if( $request->edit_email=='on'){$chanels=$chanels.',Email';}}
elseif( $request->edit_sms=='on'){{$chanels=$chanels.'SMS';if( $request->edit_email=='on'){$chanels=$chanels.',Email';} }}
elseif( $request->edit_email=='on'){$chanels=$chanels.'Email';}


if($chanels==''){
   session()->flash('error', 'please check one channel at least..!!!');
  return redirect('admin/campaign');
}
  $model= new campaign;
    $camp=$model->find($request->edit_value);
    $newDate = date("Y-m-d", strtotime($request->camp_date));

 $camp->camp_name=$request->camp_name;
 $camp->camp_date=$newDate;
 $camp->camp_start=$request->camp_start;
 $camp->time_zone=$request->time_zone;
 $camp->channels=$chanels;
 $camp->status=$request->status;
 $camp->voice_mail_rate=$request->voice_rate;
 $camp->sms_rate=$request->sms_rate;

 
 $camp->save();
  session()->flash('update', 'compaign was updated');
return redirect('admin/campaign');
}

function deleteallCamp($id){
    $value= new campaign;
  if($value->destroy($id)){session()->flash('delete', 'compaign was deleted');}

    return redirect('admin/campaign');
}




function EditCustomer(Request $request){
  if(!preg_match("/^[0-9]{10}$/", $request->sender_sms) ) {
 session()->flash('error', 'sms sender is not valid !!');
return redirect('admin/customer');
}

if(!preg_match("/^[0-9]{10}$/", $request->sender_voice) ) {
session()->flash('error', 'voicemail sender is not valid !!');
return redirect('admin/customer');
}
if(!preg_match("/^[0-9]{10}$/", $request->contact_name) ) {
session()->flash('error', 'contact number is not valid !!');
return redirect('admin/customer');
}
if(!preg_match("/^[0-9]{10}$/", $request->alternate_number) ) {
session()->flash('error', 'alternate number is not valid !!');
return redirect('admin/customer');
}


 $profile=new profile;
 $update=$profile->find($request->edit_id);
 $update->f_name=$request->f_name;
  $update->l_name=$request->l_name;
  $update->paid=$request->paid;
   $update->contact_name=$request->contact_name;
    $update->alternate_number=$request->alternate_number;
    $update->sms_s_id=$request->sender_sms;
    $update->rvm_s_id=$request->sender_voice;
     if($update->save()){session()->flash('update', 'customer was updated');}
      return redirect('admin/customer');
}

  function log_to_any_user(Request $request){

    $value=$request->email;
    $model=new User;
  $user =$model ::where('email', $value)->get()->first();

  Auth::guard()->login($user);
   return redirect()->intended('user/dashboard/campaign');
  }


}
