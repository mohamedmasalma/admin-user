<?php

namespace App\Http\Controllers\admin\content;

use Illuminate\Http\Request;
use App\campaign;
use Illuminate\Support\Facades\Auth;
class campController extends Controller
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

function create_camp(){
    return view('admin.campaigns.create_campaign');
}
  
function all_camp(){
  $camp= new campaign;
       $all=$camp->all()->where('admin_id',Auth::user()->id);
    return view('admin.campaigns.all',compact('all'));
}
  function sche_camp(){
     $camp= new campaign;
    $schedualed=  $camp->all()->where('status', 'scheduled');
    return view('admin.campaigns.schedualed',compact('scheduled'));
}
  function completed_camp(){
     $camp= new campaign;
    $completed=  $camp->all()->where('status', 'completed');
    return view('admin.campaigns.completed',compact('completed'));
}
  

function store(Request $request){


if($request->time_zone==''){
   session()->flash('error', 'please dont forget the time zone..!!!');
  return redirect('create/camp');
}

$chanels='' ;
if( $request->voice=='on'){
  $chanels=$chanels.'RVM';if( $request->sms=='on'){$chanels=$chanels.',SMS';}if( $request->email=='on'){$chanels=$chanels.',Email';}}
elseif( $request->sms=='on'){{$chanels=$chanels.'SMS';if( $request->email=='on'){$chanels=$chanels.',Email';} }}
elseif( $request->email=='on'){$chanels=$chanels.'Email';}
if($chanels==''){
   session()->flash('error', 'please check one channel at least..!!!');
  return redirect('create/camp');
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
  $camp->admin_id=Auth::user()->id;
 $camp->save();
 session()->flash('created', 'compaign was created');
return redirect('all/camp');
}
function edit(Request $request){
   

    if($request->time_zone==''){
   session()->flash('error', 'please dont forget the time zone..!!!');
  return redirect('all/camp');}
  if($request->camp_name=='' ){
   session()->flash('error', ' name is required..!!!');
  return redirect('all/camp');
}
if($request->camp_date=='' ){
   session()->flash('error', 'date is required..!!!');
  return redirect('all/camp');
}
if($request->camp_start=='' ){
   session()->flash('error', 'start time is required..!!!');
  return redirect('all/camp');
}  

    $chanels='' ;
if( $request->edit_voice=='on'){$chanels=$chanels.'RVM';if( $request->edit_sms=='on'){$chanels=$chanels.',SMS';}if( $request->edit_email=='on'){$chanels=$chanels.',Email';}}
elseif( $request->edit_sms=='on'){{$chanels=$chanels.'SMS';if( $request->edit_email=='on'){$chanels=$chanels.',Email';} }}
elseif( $request->edit_email=='on'){$chanels=$chanels.'Email';}


if($chanels==''){
   session()->flash('error', 'please check one channel at least..!!!');
  return redirect('all/camp');
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
  $camp->admin_id=Auth::user()->id;
 $camp->save();
  session()->flash('update', 'compaign was updated');
return redirect('all/camp');
}

function deleteCamp($id){
    $value= new campaign;
  if($value->destroy($id)){session()->flash('delete', 'compaign was deleted');}

    return redirect('all/camp');
}


}
