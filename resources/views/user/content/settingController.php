<?php

namespace App\Http\Controllers\user\content;

use Illuminate\Http\Request;
use App\campaign;
use App\profile;
use Illuminate\Support\Facades\Auth;
class settingController extends Controller
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
    return view('user.settings.sms');
}
function email(){
    return view('user.settings.email');
}
function voicemail(){
    return view('user.settings.voicemail');
}

    function saveRvm(Request $request){
    $model = new profile;
    $template=$model->where('user_id',Auth::user()->id)->first();
    $template->rvm_s_id=$request->sender_id;
    $template->rvm_f_return=$request->r_calls;
    $template->save();
    session()->flash('save', 'data was saved');
    return redirect('user/setting/voicemail');
   }


       function saveEmail(Request $request){
    $model = new profile;
    $template=$model->where('user_id',Auth::user()->id)->first();
    $template->from_email=$request->f_email;
    $template->reply_to_email=$request->r_email;
    $template->save();
    session()->flash('save', 'data was saved');
    return redirect('user/setting/email');
   }


       function saveSms(Request $request){
    $model = new profile;
    $template=$model->where('user_id',Auth::user()->id)->first();
    $template->sms_s_id=$request->sms_sender_id;
    $template->sms_f_reply=$request->sms_reply;
    $template->save();
    session()->flash('save', 'data was saved');
    return redirect('user/setting/sms');
   }

}
