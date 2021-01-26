<?php

namespace App\Http\Controllers\user\content;

use Illuminate\Http\Request;
use App\campaign;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
class campController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
     
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */

function create_camp(){
    return view('user.campaigns.create_campaign');
}
  
function all_camp(){
    $camp=new campaign;
      $all = $camp->all()->where('user_id',Auth::user()->id);

    return view('user.campaigns.all',compact('all'));
}
  function sche_camp(){
     $camp= new campaign;
    $schedualed=  $camp->all()->where('status', 'schedualed')->where('user_id',Auth::user()->id);
    return view('user.campaigns.schedualed',compact('schedualed'));
}
  function completed_camp(){
     $camp= new campaign;
    $completed=  $camp->all()->where('status', 'completed')->where('user_id',Auth::user()->id);
  
    return view('user.campaigns.completed',compact('completed'));
}
  
// ___________________STORE FUNCTION_______________________________________


function store(Request $request){

if($request->time_zone=='' ){
   session()->flash('error', ' time zone is required..!!!');
  return redirect('user/create/camp');
}


  if (! Auth::user()->paid) {
    session()->flash('not_paid', 'ypu should subscibe to be able to create campaign');
    return redirect('user/accounts/subscription');
    
   } 

$chanels='' ;
if( $request->voice=='on'){
  $chanels=$chanels.'RVM';if( $request->sms=='on'){$chanels=$chanels.',SMS';}if( $request->email=='on'){$chanels=$chanels.',Email';}}
elseif( $request->sms=='on'){{$chanels=$chanels.'SMS';if( $request->email=='on'){$chanels=$chanels.',Email';} }}
elseif( $request->email=='on'){$chanels=$chanels.'Email';}

if($chanels==''){
   session()->flash('error', 'please check one channel at least..!!!');
  return redirect('user/create/camp');
}
  $camp= new campaign;
 $newDate = date("Y-m-d", strtotime($request->camp_date));
 $camp->camp_name=$request->camp_name;
 $camp->camp_date=$newDate;
 $camp->camp_start=$request->camp_start;
 $camp->time_zone=$request->time_zone;
 $camp->channels=$chanels;
 $camp->voice_mail_rate=$request->voice_rate;
 $camp->sms_rate=$request->sms_rate;
 $camp->user_id=Auth::user()->id;
 $camp->save();
 session()->flash('created', 'compaign was created');
 return redirect('user/all/camp');
}

//_________________________END STORE FUNCTION________________________________



function deleteCamp($id){
  $value= new campaign;
  $status=$value->find($id)->status;
  if($status=='schedualed' || $status=='completed'){ 
      session()->flash('error', 'you cant delete scheduled or completed campaigs!!');
      return redirect('user/all/camp');
  }
  if($value->destroy($id)){session()->flash('delete', 'compaign was deleted');}

    return redirect('user/all/camp');
}


function EditCamp(Request $request){

   if($request->camp_name=='' ){
   session()->flash('error', ' name is required..!!!');
  return redirect('user/all/camp');
}
if($request->camp_date=='' ){
   session()->flash('error', 'date is required..!!!');
  return redirect('user/all/camp');
}
if($request->camp_start=='' ){
   session()->flash('error', 'start time is required..!!!');
  return redirect('user/all/camp');
}  
  if($request->time_zone==''){
   session()->flash('error', 'please dont forget the time zone..!!!');
  return redirect('user/all/camp');
}

   $value= new campaign;
   $camp=$value->find($request->edit_value);
    $newDate = date("Y-m-d", strtotime($request->camp_date));
        $chanels='' ;
if( $request->edit_voice=='on'){$chanels=$chanels.'RVM';if( $request->edit_sms=='on'){$chanels=$chanels.',SMS';}if( $request->edit_email=='on'){$chanels=$chanels.',Email';}}
elseif( $request->edit_sms=='on'){{$chanels=$chanels.'SMS';if( $request->edit_email=='on'){$chanels=$chanels.',Email';} }}
elseif( $request->edit_email=='on'){$chanels=$chanels.'Email';}
if($chanels==''){
   session()->flash('error', 'please check one channel at least..!!!');
  return redirect('user/all/camp');
}

 $camp->camp_name=$request->camp_name;
 $camp->camp_date=$newDate;
 $camp->camp_start=$request->camp_start;
 $camp->time_zone=$request->time_zone;
 $camp->channels=$chanels;
 $camp->voice_mail_rate=$request->voice_rate;
 $camp->sms_rate=$request->sms_rate;

 $camp->save();
 session()->flash('update', 'compaign was updated');
 return redirect('user/all/camp');
}

}
