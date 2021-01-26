@extends('admin/app')

@section('inner')
@section('lead','m-menu__item--active  m-menu__item--active-tab')
@section('lead_add', 'm-menu__item--active')

<div class="m-grid__item m-grid__item--fluid  m-grid m-grid--ver-desktop m-grid--desktop m-page__container m-body">
<!-- BEGIN: Left Aside -->

<div class="m-grid__item m-grid__item--fluid m-wrapper">
<!-- BEGIN: Subheader -->
<div class="m-subheader ">
<div class="d-flex align-items-center">
<div class="mr-auto">
<h3 class="m-subheader__title m-subheader__title--separator">Add Leads</h3>

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

<div class="myowndiv">




<form  method="POST" action="{{ route('store.lead') }}" enctype="multipart/form-data" >

  @csrf
<div class="row">
<div class="form-group col-sm-6 ">
<label class="form-label"> First  Name</label>
<input type="text" name="f_name" class="form-control">
</div>

<div class="form-group col-sm-6 ">
<label class="form-label"> Last  Name</label>
<input type="text" name="l_name" class="form-control">
</div>



<div class="form-group col-sm-6 ">
<label class="form-label"> Phone  Number</label>
<input type="text" name="phone" class="form-control">
</div>


<div class="form-group col-sm-6 ">
<label class="form-label"> Phone  Type</label>
<select name="phone_type" class="form-control">
<option selected=""> Cell</option>
<option > Landline</option>
</select>

</div>

<div class="form-group col-sm-12 ">
<label class="form-label"> E-Mail</label>
<input type="mail" name="email" class="form-control">
</div>

<div class="form-check-inline" style="margin-bottom: 10px">
<label class="form-check-label">
<input type="checkbox" name="dnc" class="form-check-input" value="on">DNC
</label>
</div>
<div class="form-check-inline" style="margin-bottom: 10px">
<label class="form-check-label">
<input type="checkbox" name="sold" class="form-check-input" value="on">Sold
</label>
</div>


<div class="form-group  col-sm-12">

<button type="submit" class="btn btn-primary">Add</button>
</div>

</div>
</form>

</div>










</div>



</div>






</div>










@endsection