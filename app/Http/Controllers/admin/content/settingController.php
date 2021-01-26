<?php

namespace App\Http\Controllers\admin\content;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\campaign;
use App\profile;
class settingController extends Controller
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
     
     $sender=Auth::user()->profile->sms_s_id;
    $reply=Auth::user()->profile->sms_f_reply;
    return view('admin.settings.sms',compact('sender','reply'));
}
function email(){
    return view('admin.settings.email');
}
function voicemail(){
    $sender=Auth::user()->profile->rvm_s_id;
    $reply=Auth::user()->profile->rvm_f_return;
    return view('admin.settings.voicemail',compact('sender','reply'));
}


 function saveRvm(Request $request){
    if(!preg_match("/^[0-9]{10}$/", $request->r_calls) ) {
       session()->flash('error', ' data is not valid !!');
        return redirect('setting/voicemail');
}
    $model = new profile;
    $template=$model->where('admin_id',Auth::user()->id)->first();
    $template->rvm_s_id=$request->sender_id;
    $template->rvm_f_return=$request->r_calls;
    $template->save();
    session()->flash('save', 'data was saved');
    return redirect('setting/voicemail');
   }


       function saveEmail(Request $request){
               if (!filter_var($request->f_email, FILTER_VALIDATE_EMAIL)||!filter_var($request->r_email, FILTER_VALIDATE_EMAIL) ){
        session()->flash('error', 'email is not valid');
         return redirect('setting/email');
 
}
    $model = new profile;
    $template=$model->where('admin_id',Auth::user()->id)->first();
    $template->from_email=$request->f_email;
    $template->reply_to_email=$request->r_email;
    $template->save();
    session()->flash('save', 'data was saved');
    return redirect('setting/email');
   }


       function saveSms(Request $request){
            if(!preg_match("/^[0-9]{10}$/", $request->sms_reply) ) {
       session()->flash('error', 'data  is not valid !!');
        return redirect('setting/sms');
}
    $model = new profile;
    $template=$model->where('admin_id',Auth::user()->id)->first();
    $template->sms_s_id=$request->sms_sender_id;
    $template->sms_f_reply=$request->sms_reply;
    $template->save();
    session()->flash('save', 'data was saved');
    return redirect('setting/sms');
   }



}
