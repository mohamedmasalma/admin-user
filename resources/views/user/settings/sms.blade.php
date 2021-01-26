@extends('user/app')

@section('inner')
@section('setting','m-menu__item--active  m-menu__item--active-tab')
@section('sms_setting', 'm-menu__item--active')


<div class="m-grid__item m-grid__item--fluid  m-grid m-grid--ver-desktop m-grid--desktop m-page__container m-body">
<!-- BEGIN: Left Aside -->

<div class="m-grid__item m-grid__item--fluid m-wrapper">
<!-- BEGIN: Subheader -->
<div class="m-subheader ">
<div class="d-flex align-items-center">
<div class="mr-auto">
<h3 class="m-subheader__title m-subheader__title--separator"> SMS  Settings</h3>

</div>

</div>
</div>
<!-- END: Subheader -->


<div class="m-content"> 
@if (session('save'))
      <div class="alert alert-dismissible alert-success">
      <strong>Done!</strong>   {{session('save')}}
      </div>       
     @endif
     @if (session('error'))
      <div class="alert alert-dismissible alert-danger">
      <strong>alert!</strong>   {{session('error')}}
      </div>       
     @endif

<div class="myowndiv">



<div class="sms_provide" style="box-shadow:none">

  
<div class="row">


<div class="col-2" ><b>Sender ID :</b> </div>
 <div  class="col-5" ><input type="text" value="{{$sender}}" readonly  class="form-control" name='sender_id' > </div> 
      
</div>


</div>


<p>Sender ID This is automatically set from your SMS Provider Account. Please
contact Support to change this.</p>


<form  method="POST" action="{{ route('user.save.sms') }}" enctype="multipart/form-data" >
@csrf
<div class="row">

<div class="col-2" ><b>Forward Returned Calls to :</b> </div>
 <div  class="col-4 offset-0" ><input type="text" id="sms_reply" value="{{$reply}}"  class="form-control" name='sms_reply' > </div> 
      
</div>

 <button type="submit" class="btn btn-primary">Save</button>



</form>










</div>



</div>






</div>
</div>













@endsection