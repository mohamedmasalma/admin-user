<?php

namespace App\Http\Controllers\admin\content;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\campaign;
use App\email_temp;
use App\sms_temp;
use App\voicemail_temp;
use App\User;
class templateController extends Controller
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

function sms(){
    $template = new sms_temp;
    $sms=$template->all()->where('user_id',0);;
    return view('admin.templates.sms',compact('sms'));
}
function email(){
     $template = new email_temp;
    $emails=$template->all()->where('user_id',0);
    return view('admin.templates.email',compact('emails'));
}
function voicemail(){
  $template = new voicemail_temp;
    $voices=$template->all()->where('user_id',0);
    return view('admin.templates.voicemail',compact('voices'));
}

function addTemplate(){
    return view('admin.templates.add');
}

function addSms(Request $request){
    $template = new sms_temp;
   $template->name=$request->sms;
    $template->body=$request->sms_body;
    $template->admin_id=Auth::user()->id;
    $template->user_id=0;
    $template->save();
    $model=new User;
    $users=$model->all()->where('status',1);
    foreach ($users as $key => $user) {
    $template=new sms_temp;
    $template->name=$request->sms;
    $template->body=$request->sms_body;
    $template->user_id=$user->id;
    $template->admin_id=Auth::user()->id;
    $template->save();

    }
    
    session()->flash('add', 'sms was added');

   return redirect('template/sms');
   
}  
function addEmail(Request $request){
    $template = new email_temp;
    $template->name=$request->email;
    $template->body=$request->email_body;
    $template->subject=$request->EmailSub;
    $template->admin_id=Auth::user()->id;
    $template->user_id=0;
    $template->save();
    $model=new User;
    $users=$model->all()->where('status',1);
    foreach ($users as $key => $user) {
    $template = new email_temp;
    $template->name=$request->email;
    $template->body=$request->email_body;
    $template->subject=$request->EmailSub;
    $template->admin_id=Auth::user()->id;
    $template->user_id=$user->id;
    $template->save();

    }
    session()->flash('add', 'email was added');

   return redirect('template/email');
   }

   function editSms(Request $request){
    $model =new sms_temp;
    $template=$model->find($request->edit_id);
    $template->name=$request->sms;
    $template->body=$request->sms_body;
    $template->save();
    session()->flash('update', 'sms was updated');
    return redirect('template/sms');
   
   }

   function editEmail(Request $request){
     $model = new email_temp;
    $template=$model->find($request->edit_id);
    $template->subject=$request->EmailSub;
    $template->name=$request->email;
    $template->body=$request->email_body;
    $template->save();
    session()->flash('update', 'Email was updated');
    return redirect('template/email');
   }

  function uploadVoicemail(Request $request){
    if ($request->hasFile('mp3_file')){
    $modal=new voicemail_temp;
    $temp=$modal->where('name',$request->name)->get();
    
    $file=$request->mp3_file;
    $name=$request->name;
    $path = $file->storeAs('mp3', $name.'.mp3', 'public_uploads');
    $template=new voicemail_temp;
    $template->name=$name;
    $template->user_id=0;
    $template->path=$path;
    $template->admin_id=Auth::user()->id;
     try{
           $template->save();
         }
         catch(\Exception $e){
          session()->flash('error', 'this name is already exists ');
         return redirect('add/template');
             }


   $model=new user;
   $users=$model->all()->where('status',1);
   foreach ($users as $key => $user) {
    $template=new voicemail_temp;
    $template->name=$name;
    $template->user_id=$user->id;
    $template->path=$path;
    $template->admin_id=Auth::user()->id;
    $template->save();
  }
    session()->flash('create', 'voicemail was uploaded');
    return redirect('template/voicemail');
        
    
       }

  }

   function deleteVoicemail(Request $request){
   
  $value= new voicemail_temp;
  if($value->destroy($request->edit_id)){session()->flash('delete', 'voicemail was deleted');}
  return redirect('template/voicemail');

         }

}
