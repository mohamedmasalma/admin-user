@extends('admin/app')

@section('inner')
@section('account','m-menu__item--active  m-menu__item--active-tab')
@section('account_subscription', 'm-menu__item--active')

<div class="m-grid__item m-grid__item--fluid  m-grid m-grid--ver-desktop m-grid--desktop m-page__container m-body">
<!-- BEGIN: Left Aside -->

<div class="m-grid__item m-grid__item--fluid m-wrapper">
<!-- BEGIN: Subheader -->
<div class="m-subheader ">
<div class="d-flex align-items-center">
<div class="mr-auto">
<h3 class="m-subheader__title m-subheader__title--separator">Subscription</h3>

</div>

</div>
</div>
<!-- END: Subheader -->


<div class="m-content"> 


<div class="myowndiv">



<form method="post">

<div class="row">

<div class="col-sm-12 ">

<h3 class="mb-5 text-capitalize">Manage your subscription here.</h3>


<div class="form-group ">
<button class="btn btn-danger"> CANCEL
SUBSCRIPTION
</button>

</div>

<p class="mt-5">Cancelled subscription will continue running until after end of billing date.
Please note that we have a <b>non-refundable </b>​ policy.</p>


<div class="alert alert-primary change_plan ">
  
<div class="row">
<div class="col-sm-2 ">
	
	
	
	<i class="m-menu__link-icon flaticon-home"></i>

</div>

<div class="col-sm-7 text-left ">
	
<b>Basic</b>
<p>Monthly Basic Plan. 1000 Leads Included. 1 Campaign Per Month</p>

</div>

<div class="col-sm-3 ">

<div class="form-group float-right ">
<button class="btn btn-success"> Change Plan

</button>

</div>

</div>

</div>




</div>


</div>

</div>


</form>







</div>



</div>






</div>
</div>



@endsection