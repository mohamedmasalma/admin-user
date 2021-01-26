<?php

namespace App\Http\Controllers\user\content;

use Illuminate\Http\Request;
use App\template;

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
     $template = new template;
    $sms=$template->all();
    return view('user.templates.sms',compact('sms'));
}
function email(){
     $template = new template;
    $emails=$template->all();
    return view('user.templates.email',compact('emails'));
}
function voicemail(){
    return view('user.templates.voicemail');
}

 function editSms(Request $request){
    $model = new template;
    $template=$model->find($request->edit_id);
    $template->sms_template=$request->sms;
    $template->sms_body=$request->sms_body;
    $template->save();
    session()->flash('update', 'sms was updated');
    return redirect('user/template/sms');
   }

   function editEmail(Request $request){
    $model = new template;
    $template=$model->find($request->edit_id);
    $template->email_subject=$request->EmailSub;
    $template->email_template=$request->email;
    $template->email_body=$request->email_body;
    $template->save();
    session()->flash('update', 'Email was updated');
    return redirect('user/template/email');
   }



}
