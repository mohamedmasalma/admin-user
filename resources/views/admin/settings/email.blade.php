@extends('admin/app')

@section('inner')
@section('setting','m-menu__item--active  m-menu__item--active-tab')
@section('setting_email', 'm-menu__item--active')



<div class="m-grid__item m-grid__item--fluid  m-grid m-grid--ver-desktop m-grid--desktop m-page__container m-body">
<!-- BEGIN: Left Aside -->

<div class="m-grid__item m-grid__item--fluid m-wrapper">
<!-- BEGIN: Subheader -->
<div class="m-subheader ">
<div class="d-flex align-items-center">
<div class="mr-auto">
<h3 class="m-subheader__title m-subheader__title--separator"> E-Mail  Settings</h3>

</div>

</div>
</div>
<!-- END: Subheader -->


<div class="m-content"> 

@if (session('error'))
      <div class="alert alert-dismissible alert-danger">
      <strong>Alert!</strong>   {{session('error')}}
      </div>       
     @endif
     @if (session('save'))
      <div class="alert alert-dismissible alert-success">
      <strong>done!</strong>   {{session('save')}}
      </div>       
     @endif

<div class="myowndiv">





<div class="sms_provide" style="box-shadow: none;">




<form  method="POST" action="{{ route('save.email') }}" enctype="multipart/form-data" >
@csrf

 <label for="exampleTextarea">From E-mail</label>
    <div class="form-group">
        <input type="text" id="from_email" value="{{Auth::user()->profile->from_email}}"  class="form-control" name='f_email' >
      </div>


  <label for="exampleTextarea">Reply to E-mail</label>
    <div class="form-group">
        <input type="text" id="reply_email" value="{{Auth::user()->profile->reply_to_email}}"  class="form-control" name='r_email' >
      </div>

   
   <button type="submit" class="btn btn-primary">Save</button>

</form>








</div>








</div>








</div>



</div>






</div>
</div>









@endsection