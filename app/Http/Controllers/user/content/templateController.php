<?php

namespace App\Http\Controllers\user\content;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\sms_temp;
use App\email_temp;
use App\voicemail_temp;

class templateController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
          // $this->middleware('user');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */

function sms(){
    

    return view('user.templates.sms');
}
function email(){
   
    return view('user.templates.email');
}
function voicemail(){
   
    
    return view('user.templates.voicemail');
}

 function editSms(Request $request){
    $model =new sms_temp;
    $template=$model->find($request->edit_id);
    $template->name=$request->sms;
    $template->body=$request->sms_body;
    $template->save();
    session()->flash('update', 'sms was updated');
    return redirect('user/template/sms');
   }

   function editEmail(Request $request){
    $model = new email_temp;
    $template=$model->find($request->edit_id);
    $template->subject=$request->EmailSub;
    $template->name=$request->email;
    $template->body=$request->email_body;
    $template->save();
    session()->flash('update', 'Email was updated');
    return redirect('user/template/email');
   }

  function deleteVoicemail(Request $request){
   
     $value= new voicemail_temp;
  if($value->destroy($request->edit_id)){session()->flash('delete', 'voicemail was deleted');}

    return redirect('user/template/voicemail');

}



}
