<?php

namespace App\Http\Controllers\user\content;

use Illuminate\Http\Request;
use App\campaign;
use App\lead;
use Illuminate\Support\Facades\Auth;
class dashboardController extends Controller
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

function showCampaign(){
    $camp=new campaign;
    $id=Auth::user()->id;
    $all_count= $camp::all()->where('user_id',$id)->count();
    $sche_count= $camp::all()->where('status','scheduled')->where('user_id',$id)->count();
    $comp_count= $camp::all()->where('status','completed')->where('user_id',$id)->count();
  $count=array('all' => $all_count,'sche' => $sche_count ,'completed' => $comp_count  );

    return view('user.dashboard.campaign',compact('count'));
}
  
 function showLead(){
      $camp=new lead;
       $id=Auth::user()->id;
   $all_count= $camp::all()->where('user_id',$id)->count();
    $sche_count= $camp::all()->where('dnc','yes')->where('user_id',$id)->count();
    $comp_count= $camp::all()->where('dnc','no')->where('user_id',$id)->count();
      $count=array('all' => $all_count,'dnc' => $sche_count ,'notdnc' => $comp_count  );

    return view('user.dashboard.lead',compact('count'));
}



}
