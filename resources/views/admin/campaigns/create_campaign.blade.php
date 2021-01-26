@extends('admin/app')

@section('inner')
@section('campaign', 'm-menu__item--active  m-menu__item--active-tab')
@section('campaign_create', 'm-menu__item--active')
<div class="m-grid__item m-grid__item--fluid  m-grid m-grid--ver-desktop m-grid--desktop m-page__container m-body">
<!-- BEGIN: Left Aside -->

<div class="m-grid__item m-grid__item--fluid m-wrapper">
<!-- BEGIN: Subheader -->
<div class="m-subheader ">
<div class="d-flex align-items-center">
<div class="mr-auto">
<h3 class="m-subheader__title m-subheader__title--separator">Create Campaign</h3>

</div>

</div>
</div>
<!-- END: Subheader -->


<div class="m-content"> 

@if (session('error'))
      <div class="alert  alert-danger" role="alert">
      <strong>alert!</strong>   {{session('error')}}
      </div>       
     @endif
<div class="myowndiv">
<form  method="POST" id="create_admin_camp_form" action="{{ route('store.camp') }}" enctype="multipart/form-data" >

  @csrf
<div class="row">
 


<div class="form-group col-sm-6 ">
<label class="form-label"> Campaign Name</label>
<input type="text" name="camp_name" class="form-control" required>
</div>




<div class="form-group  col-sm-3">
<label class="form-label"> Campaign Date</label>
<input type="text" name="camp_date" class="form-control datepicker" required>

</div>

<div class="form-group  col-sm-3">

<p> Channels</p>
<div class="form-check-inline">
<label class="form-check-label">
<input type="checkbox" name="email" class="form-check-input"  value="on" >E-Mail
</label>
</div>
<div class="form-check-inline">
<label class="form-check-label">
<input type="checkbox" name="sms" class="form-check-input" value="on">SMS
</label>
</div>
<div class="form-check-inline">
<label class="form-check-label">
<input type="checkbox" name="voice" class="form-check-input" value="on">Ringless Voicemail
</label>
</div>
</div>




<div class="form-group  col-sm-6">
<label class="form-label"> Campaign Start Time</label>
<input type="text" id="m_timepicker" name="camp_start" class="form-control timepicker " required >

</div>


<div class="form-group  col-sm-6">
<label class="form-label"> Time Zone </label>
<select class="form-control" id="create_time_zone" name="time_zone" id="timezone1">  
<option value="" selected="select">Select</option>   
<option value="Pacific" >Pacific</option>
<option value="Mountain">Mountain</option>
<option value="Central">Central</option>

</select>
</div>





<div class="form-group  col-sm-6">
<label class="form-label"> Ringless Voicemail Rate (Per Hour) </label>
<select class="form-control" id="hours_Rvm" name='voice_rate'>   
<option value=""  selected="select">Select</option>   
<option value="50"> 50</option>
<option value="100"> 100</option>
<option value="150"> 150</option>
<option value="200"> 200</option>





</select>
</div>




<div class="form-group  col-sm-6">
<label class="form-label"> SMS Rate (Per Hour) </label>
<select class="form-control" name='sms_rate' id="smsrate">  
<option value="" selected="select">Select</option>    
<option value="50"> 50</option>
<option value="100"> 100</option>
<option value="150"> 150</option>
<option value="200"> 200</option>



</select>
</div>





<div class="form-group  col-sm-12">

<button type="submit" class="btn btn-primary">Create Campaign</button>
</div>



</div>


</div>



</div>






</div>
</div>







</form>

@endsection