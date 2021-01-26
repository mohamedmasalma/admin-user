@extends('user/app')

@section('inner')

@section('campaign', 'm-menu__item--active  m-menu__item--active-tab')
@section('campaign_all', 'm-menu__item--active')
<div class="m-grid__item m-grid__item--fluid  m-grid m-grid--ver-desktop m-grid--desktop m-page__container m-body">
<!-- BEGIN: Left Aside -->

<div class="m-grid__item m-grid__item--fluid m-wrapper">
<!-- BEGIN: Subheader -->
<div class="m-subheader ">
<div class="d-flex align-items-center">
<div class="mr-auto">
<h3 class="m-subheader__title m-subheader__title--separator">Campaigns</h3>

</div>

</div>
</div>
<!-- END: Subheader -->


<div class="m-content"> 


<div class="myowndiv">

<div class="row">



<div class="col-sm-12">
  

<div class="m-widget11">
    @if (session('created'))
      <div class="alert  alert-success" role="alert">
      <strong>alert!</strong>   {{session('created')}}
      </div>       
     @endif
  @if (session('error'))
      <div class="alert  alert-danger" role="alert">
      <strong>alert!</strong>   {{session('error')}}
      </div>       
     @endif
  @if (session('delete'))
      <div class="alert alert-dismissible alert-danger">
      <strong>done!</strong>   {{session('delete')}}
      </div>       
     @endif
       @if (session('update'))
      <div class="alert alert-dismissible alert-success">
      <strong>done!</strong>   {{session('update')}}
      </div>       
     @endif
<div class="table-responsive">

<table class="table">
<!--begin::Thead-->
<thead>
<tr>
<td >Date</td>
<td > Name</td>
<td >Start Time</td>
<td >Channels</td>
<td >Time Zone</td>
<td>Status</td>
<td >Action </td>
</tr>
</thead>

<tbody>

  @foreach($all as $prop)
    <tr>
      <td>{{$prop['camp_date']}}</td>
        <td>{{$prop['camp_name']}}</td>
        <td>{{$prop['camp_start']}}</td>
        <td>{{$prop['channels']}}</td>
        <td>{{$prop['time_zone']}}</td>
        <td>{{$prop['status']}}</td>
<td> <div class="myown_btns">
<button class="btn btn-primary" onclick="showCamp({{$prop}})" data-toggle="modal" data-target="#showModel"> <i class="fa fa-eye"></i> View </button>
  <button class="btn btn-success" onclick="editCamp({{$prop}})" data-toggle="modal" data-target="#editCampModel"><i class="fa fa-edit"> </i>  Edit</button>
    <button  <button class="btn btn-danger" onclick="deleteCamp({{$prop['id']}})" data-toggle="modal" data-target="#deleteModel"><i class="fa fa-times"> </i>  Delete</button>     </div> 
<form method="post" id="camp{{$prop['id']}}" action="{{route('delete.camp',["id"=>$prop['id']])}}" style="display: none;"> @csrf</form>
</td>
</tr>
@endforeach
</table>



</div></div>



</div>

</div>
</div>
</div>
</div>
</div>





<!-- DELETE -->
<div class="modal fade" id="deleteModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Delete Campaign</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="delete">
       
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" id="deleteBtn" class="btn btn-danger">Delete</button>
      </div>
    </div>
  </div>
</div>






<!-- Show -->
<div class="modal fade" id="showModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Show Campaign</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="showCampdBody">
       <div class="form-group">
      <label for="exampleInputEmail1">Name </label>
      
       <input type="text" class="form-control" readonly id="name" placeholder="name">
    </div>
     
       <div class="form-group">
        <label for="exampleInputEmail1">Date</label>
       <input type="text" class="form-control" readonly id="date" placeholder="date">
    </div>
     
        <div class="form-group">
        <label for="exampleInputEmail1">Start time</label>
        <input type="text" class="form-control" readonly id="start_time" placeholder="start time">
    </div>
      
       <div class="form-group">
        <label for="exampleInputEmail1">Time Zone</label>
        <input type="text" class="form-control" readonly id="time_zone" placeholder="time zone">
    </div>
     
        <div class="form-group">
        <label for="exampleInputEmail1">Voice E-mail Rate</label>
        <input type="text" class="form-control" readonly id="voice_rate" placeholder=">voiceemail rate">
  
    </div>
   
        <div class="form-group">
        <label for="exampleInputEmail1">SMS Rate</label>
        <input type="text" class="form-control" readonly id="sms_rate" placeholder="sms rate">
      
    </div>
      
        <div class="form-group">
          <label for="exampleInputEmail1">Channels</label>
          <input type="text" class="form-control" readonly id="channels" placeholder="channels">

    </div>

    <div class="form-group">
          <label for="exampleInputEmail1">Status</label>
          <input type="text" class="form-control" readonly id="status" placeholder="status">

    </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        
      </div>
    </div>

  </div>
</div>


<!-- edit -->

<div class="modal fade" id="editCampModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Edit Campaign</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="editCampdBody">
        <form  method="POST" id="editCampForm" action="{{ route('user.edit.camp') }}" enctype="multipart/form-data" id="updateCampForm">
        @csrf 
        <input type="text" class="form-control" style="display: none;" name="edit_value"  id="edit_id" placeholder="name">
       <div class="form-group">

      <label for="exampleInputEmail1">Name </label>
      <input type="text" class="form-control" name="camp_name" id="edit_name" placeholder="name" required >
    </div>
     

    <div class="form-group  ">
    <label class="form-label"> Date</label>
    <input type="text" name="camp_date" class="form-control datepicker" id="edit_date"  required>
    </div>

     
      

<div class="form-group  ">
<label class="form-label">  Start Time</label>
<input type="text" name="camp_start" id="edit_start_time" class="form-control timepicker">
</div>



<div class="form-group ">
<label class="form-label"> Time Zone </label>
<select class="form-control" name="time_zone"  id="edit_time_zone">    
<option value="Pacific" >Pacific</option>
<option value="Mountain">Mountain</option>
<option value="Central">Central</option>
</select>
</div>





<div class="form-group ">
<label class="form-label">Voicemail Rate (Per Hour) </label>
<select class="form-control" name="voice_rate"  id="edit_voice_rate">   
<option value="50"> 50</option>
<option value="100"> 100</option>
<option value="150"> 150</option>
<option value=200""> 200</option>
</select>
</div>




<div class="form-group ">
<label class="form-label"> SMS Rate (Per Hour) </label>
<select class="form-control" name=" sms_rate"  id="edit_sms_rate" >     
<option value="50"> 50</option>
<option value="100"> 100</option>
<option value="150"> 150</option>
</select>
</div>
      
  
       <div class="form-group">
          <label for="exampleInputEmail1">Channels</label>
          <div class="form-check-inline" style="margin-bottom: 10px">
         <label class="form-check-label">
          <input type="checkbox" name="edit_sms" id="check_sms" class="form-check-input" value="on">SMS
          </label>
           </div>
           <div class="form-check-inline" style="margin-bottom: 10px">
           <label class="form-check-label">
           <input type="checkbox" name="edit_email" id="check_email" class="form-check-input" value="on">E-Mail
          </label>
          </div>
           <div class="form-check-inline" style="margin-bottom: 10px">
           <label class="form-check-label">
           <input type="checkbox" name="edit_voice" id="check_voice" class="form-check-input" value="on">Voicemail
          </label>
          </div>

          </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
         <button type="submit" onclick="$('#editCampForm').submit();" class="btn btn-primary" data-dismiss="modal">Update</button>
        
        
      </div>
    </form>
    </div>

  </div>
</div>

<script type="text/javascript">
    function showCamp(camp){ 
  
$('#showCampdBody #name').val(camp['camp_name']) ;
$('#showCampdBody #date').val(camp['camp_date'])  ;
$('#showCampdBody #time_zone').val(camp['time_zone'])  ;
$('#showCampdBody #start_time').val(camp['camp_start'])  ;
$('#showCampdBody #channel').val(camp['channel'])  ;
$('#showCampdBody #status').val(camp['status'])  ; 
$('#showCampdBody #channels').val(camp['channels'])  ; 
$('#showCampdBody #sms_rate').val(camp['sms_rate'])  ;  
$('#showCampdBody #voice_rate').val(camp['voice_mail_rate'])  ;  
 

    }

	function deleteCamp(id){ 
  
$('#delete').html('Are you sure you want to delete this campaign??')    
$('#deleteBtn').attr("onclick", "event.preventDefault();$('#camp"+id+"').submit();");

		}

  function editCamp(camp){ 
    var sms='';var email='';var voice='';var array ;
    var i= camp['channels'];
   if(i.indexOf('RVM')>=0){$('#check_voice').attr('checked',true);}
    if(i.indexOf('SMS')>=0){$('#check_sms').attr('checked',true);}
      if(i.indexOf('Email')>=0){$('#check_email').attr('checked',true);} 
$('#editCampdBody #edit_name').val(camp['camp_name']) ;
$('#editCampdBody #edit_date').val(camp['camp_date'])  ;
$('#editCampdBody #edit_time_zone').val(camp['time_zone'])  ;
$('#editCampdBody #edit_start_time').val(camp['camp_start'])  ;
$('#editCampdBody #edit_status').val(camp['status'])  ; 
$('#editCampdBody #edit_sms_rate').val(camp['sms_rate'])  ;  
$('#editCampdBody #edit_id').val(camp['id'])  ;  
$('#editCampdBody #edit_voice_rate').val(camp['voice_mail_rate'])  ;  

  

    } 
$(document).ready(function(){

});

</script>
<!-- END DELETE -->
@endsection