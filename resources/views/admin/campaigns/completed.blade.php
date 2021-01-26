@extends('admin/app')

@section('inner')
@section('campaign', 'm-menu__item--active  m-menu__item--active-tab')
@section('campaign_completed', 'm-menu__item--active')
<div class="m-grid__item m-grid__item--fluid  m-grid m-grid--ver-desktop m-grid--desktop m-page__container m-body">
<!-- BEGIN: Left Aside -->

<div class="m-grid__item m-grid__item--fluid m-wrapper">
<!-- BEGIN: Subheader -->
<div class="m-subheader ">
<div class="d-flex align-items-center">
<div class="mr-auto">
<h3 class="m-subheader__title m-subheader__title--separator"> Completed</h3>

</div>

</div>
</div>
<!-- END: Subheader -->


<div class="m-content"> 


<div class="myowndiv">

<div class="row">



<div class="col-sm-12">
	

<div class="m-widget11">
<div class="table-responsive">
<!--begin::Table-->								 
<table class="table">
<!--begin::Thead-->
<thead>
<tr>

<td >Date</td>
<td > Name</td>
<td >Channels</td>
<td >Start Time</td>
<td >Time Zone</td>
<td>Status</td>
<td >Action </td>
</tr>
</thead>

<tbody>
@foreach($completed as $comp)
<tr>
 <td>{{$comp['camp_date']}}</td>
        <td>{{$comp['camp_name']}}</td>
         <td>{{$comp['channels']}}</td>
        <td>{{$comp['camp_start']}}</td>
       
        <td>{{$comp['time_zone']}}</td>
        <td>{{$comp['status']}}</td>
<td> <div class="myown_btns"><button class="btn btn-primary" onclick="showCompCamp({{$comp}})" data-toggle="modal" data-target="#showCompCampModel"> <i class="fa fa-eye"></i> View </button>   </div> </td>
</tr>
@endforeach





</table></div></div>



</div>






</div>


</div>



</div>






</div>
</div>




<!-- view -->
<div class="modal fade" id="showCompCampModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Show Campaign</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="showCompCampdBody">
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
        <label for="exampleInputEmail1">voice email rate</label>
        <input type="text" class="form-control" readonly id="voice_rate" placeholder="voiceemail rate">
  
    </div>
   
        <div class="form-group">
        <label for="exampleInputEmail1">sms rate</label>
        <input type="text" class="form-control" readonly id="sms_rate" placeholder="sms rate">
      
    </div>
      
        <div class="form-group">
          <label for="exampleInputEmail1">channels</label>
          <input type="text" class="form-control" readonly id="channels" placeholder="channels">

    </div>

    <div class="form-group">
          <label for="exampleInputEmail1">status</label>
          <input type="text" class="form-control" readonly id="status" placeholder="status">

    </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        
      </div>
    </div>

  </div>
</div>


<script type="text/javascript">
	
	function showCompCamp(comp){ 
  
$('#showCompCampdBody #name').val(comp['camp_name']) ;
$('#showCompCampdBody #date').val(comp['camp_date'])  ;
$('#showCompCampdBody #time_zone').val(comp['time_zone'])  ;
$('#showCompCampdBody #start_time').val(comp['camp_start'])  ;
$('#showCompCampdBody #channel').val(comp['channel'])  ;
$('#showCompCampdBody #status').val(comp['status'])  ; 
$('#showCompCampdBody #sms_rate').val(comp['sms_rate'])  ;  
$('#showCompCampdBody #voice_rate').val(comp['voice_rate'])  ;  
 

    }
</script>



@endsection