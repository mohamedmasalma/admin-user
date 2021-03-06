<?php

namespace App\Http\Controllers\user\content;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\csv_data;
use App\lead;
use App\Http\Requests\CsvImportRequest;
class leadController extends Controller
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

function leadAdd(){
    return view('user.leads.add');
}
  
 function leadAll(){
    $lead= new lead;

    $leads=$lead->all()->where('user_id',Auth::user()->id);

    return view('user.leads.all',compact('leads'));
}
function leadImport(){
     
    return view('user.leads.main_import');
}
 function ShowUploadView(){
    return view('user.leads.upload');
 }

function leadDnc(){
        $lead= new lead;

    $dncs=$lead->all()->where('dnc','yes')->where('user_id',Auth::user()->id);
    return view('user.leads.dnc',compact('dncs'));
}

function leadSold(){
        $lead= new lead;

    $solds=$lead->all()->where('sold','yes')->where('user_id',Auth::user()->id);
    return view('user.leads.sold',compact('solds'));
}

function storeLead(Request $request){
    $lead=new lead;
    $sold='no';
    $dnc='no';
    if($request->dnc=='on'){  $dnc='yes';}
     if($request->sold=='on'){  $sold='yes';}
$lead->f_name=$request->f_name;
$lead->l_name=$request->l_name;
$lead->phone=$request->phone;
$lead->phone_type=$request->phone_type;
$lead->email=$request->email;
$lead->dnc=$dnc;
$lead->sold=$sold;
$lead->user_id=Auth::user()->id;
$lead->save();
session()->flash('created', 'lead was created');
return redirect('user/leads/all');;

}

function updateLead(Request $request){

    $model=new lead;
    $lead=$model->find($request->edit_id);
    $sold='no';
    $dnc='no';
    if($request->dnc=='on'){  $dnc='yes';}
     if($request->sold=='on'){  $sold='yes';}
$lead->f_name=$request->f_name;
$lead->l_name=$request->l_name;
$lead->phone=$request->phone;
$lead->phone_type=$request->phone_type;
$lead->email=$request->email;
$lead->dnc=$dnc;
$lead->sold=$sold;
$lead->user_id=Auth::user()->id;
$lead->save();
session()->flash('updated', 'lead was updated');
return redirect('user/leads/all');

}

function deleteLead($id){
    $value= new lead;
  if($value->destroy($id)){session()->flash('delete', 'lead was deleted');}

    return redirect('user/leads/all');
}

function deleteDnc($id){
    $value= new lead;
    $delete=$value->find($id);
    $delete->dnc='no';
    if($delete->save()){session()->flash('delete', 'dnc was removed');}
     return redirect('user/leads/dnc');
}

function deleteSold($id){
    $value= new lead;
    $delete=$value->find($id);
    $delete->sold='no';
    if($delete->save()){session()->flash('delete', 'lead was removed from sold');}
     return redirect('user/leads/sold');
}

public function parseImport(CsvImportRequest $request)
{

    $path = $request->file('csv_file')->getRealPath();

  
        $data = array_map('str_getcsv', file($path));

    if (count($data) > 0) {
        if ($request->has('header')) {
            $csv_header_fields = [];
            foreach ($data[0] as $key => $value) {
                $csv_header_fields[] = $key;
            }
        }
        $csv_data = array_slice($data, 0, 2);

        $csv_data_file = csv_data::create([
            'csv_filename' => $request->file('csv_file')->getClientOriginalName(),
            'csv_header' => $request->has('header'),
            'csv_data' => json_encode($data)
        ]);
    } else {
        return redirect()->back();
    }
    return view('user.leads.parse', compact( 'csv_header_fields', 'csv_data', 'csv_data_file'));

}


public function processImport(Request $request)
{    $dnc='dnc'.$request->csv_data_file_id;

       $csv=new csv_data;
    $data = $csv::find($request->csv_data_file_id);
 
    $csv_data = json_decode($data->csv_data, true);
    foreach ($csv_data as $row) {

        $lead = new lead();
        foreach (config('app.db_fields') as $index => $field) {
            if(substr_count ( $request->fields[$index] , $field[$index]  )>1)
                dd('error');
               if($request->fields[$index]==null){ 
                session()->flash('error', 'dont leave empty field name please');
              
                 return redirect('user/leads/upload/view');

               }
            $lead->$field = $row[$request->fields[$index]];
        }

         try{
            $lead->user_id=Auth::user()->id;
            $lead->save();
             }
    catch(\Exception $e){
           session()->flash('error', 'please make sure that ther is no duplicated field name or lead email ');
              
                 return redirect('user/leads/upload/view');
      
                  }
        
    }
    session()->flash('upload', 'upload was done successfuly');
    return redirect('user/leads/upload/view');
}

}
