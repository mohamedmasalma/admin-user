<?php

namespace App\Http\Controllers\admin\content;

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
        $this->middleware('auth:admin');
          // $this->middleware('admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */

function showCampaign(){
    $camp=new campaign;
    $all_count= $camp::count();
    $sche_count= $camp::all()->where('status','scheduled')->count();
    $comp_count= $camp::all()->where('status','completed')->count();
  $count=array('all' => $all_count,'sche' => $sche_count ,'completed' => $comp_count  );

    return view('admin.dashboard.campaign',compact('count'));
}
  
 function showLead(){
      $camp=new lead;
   $all_count= $camp::count();
    $sche_count= $camp::all()->where('dnc','yes')->count();
    $comp_count= $camp::all()->where('dnc','no')->count();
      $count=array('all' => $all_count,'dnc' => $sche_count ,'notdnc' => $comp_count  );

    return view('admin.dashboard.lead',compact('count'));
}



}
