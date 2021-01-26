@extends('user/app')

@section('inner')
@section('account','m-menu__item--active  m-menu__item--active-tab')
@section('account_profile', 'm-menu__item--active')

<div class="m-grid__item m-grid__item--fluid  m-grid m-grid--ver-desktop m-grid--desktop m-page__container m-body">
<!-- BEGIN: Left Aside -->

<div class="m-grid__item m-grid__item--fluid m-wrapper">
<!-- BEGIN: Subheader -->
<div class="m-subheader ">
<div class="d-flex align-items-center">
<div class="mr-auto">
  <div class="row">
<div class="col-3"> <h3 class="m-subheader__title m-subheader__title--separator">Profile</h3>
</div>

<div class="col-3 offset-2"><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter"">Edit
</button></div>
</div>

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

  @if (session('done'))
      <div class="alert alert-dismissible alert-success">
      <strong>Done!</strong>   {{session('done')}}
      </div>       
     @endif


<div class="myowndiv">



<form  method="POST" action="{{ route('user.store.profile') }}" enctype="multipart/form-data" >

  @csrf

<div class="row">



<div class="form-group col-sm-6 ">
<label class="form-label"> First  Name</label>
<input type="text" name="f_name" class="form-control" readonly placeholder="@if(Auth::user()->profile){{Auth::user()->profile->f_name}}@endif">
</div>


<div class="form-group col-sm-6 ">
<label class="form-label"> Last  Name</label>
<input type="text" name="l_name" class="form-control" readonly placeholder="@if(Auth::user()->profile){{Auth::user()->profile->l_name}}@endif">
</div>

<div class="form-group col-sm-6 ">
<label class="form-label"> Contact Phone Number</label>
<input type="phone" name="contact_name" class="form-control" readonly placeholder="@if(Auth::user()->profile){{Auth::user()->profile->contact_name}}@endif">
</div>


<div class="form-group col-sm-6 ">
<label class="form-label">Alternate Contact Number </label>
<input type="text" name="alternate_number" class="form-control" readonly placeholder="@if(Auth::user()->profile){{Auth::user()->profile->alternate_number}}@endif">
</div>

<div class="form-group col-sm-6 ">
<label class="form-label">E-Mail </label>
<input type="email" name="email" class="form-control" readonly value="{{Auth::user()->email}}">
</div>



</form>
</div>


</form>







</div>



</div>






</div>
</div>


<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Update Profile</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>


<form  method="POST" action="{{ route('user.store.profile') }}" enctype="multipart/form-data" >

  @csrf
      <div class="modal-body">
        <div class="row">



<div class="form-group col-sm-6 ">
<label class="form-label"> First  Name</label>
<input type="text" name="f_name" class="form-control" value="@if(Auth::user()->profile){{Auth::user()->profile->f_name}}@endif">
</div>


<div class="form-group col-sm-6 ">
<label class="form-label"> Last  Name</label>
<input type="text" name="l_name" class="form-control" value="@if(Auth::user()->profile){{Auth::user()->profile->l_name}}@endif">
</div>

<div class="form-group col-sm-6 ">
<label class="form-label"> Contact  Name</label>
<input type="phone" name="contact_name" class="form-control" value="@if(Auth::user()->profile){{Auth::user()->profile->contact_name}}@endif">
</div>


<div class="form-group col-sm-6 ">
<label class="form-label">Alternate Contact Number </label>
<input type="text" name="alternate_number" class="form-control" value="@if(Auth::user()->profile){{Auth::user()->profile->alternate_number}}@endif">
</div>

<div class="form-group col-sm-6 ">
<label class="form-label">E-Mail </label>
<input type="email" name="email" class="form-control" readonly value="{{Auth::user()->email}}">
</div>


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter"">@if(!Auth::user()->profile)Create @endif
@if(Auth::user()->profile) Update @endif
</button>
      </div>
    </div>
</form>
  </div>
</div>
@endsection