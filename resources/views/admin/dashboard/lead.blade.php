@extends('admin/app')

@section('inner')
@section('dashboard','m-menu__item--active  m-menu__item--active-tab')
@section('dashboard_lead', 'm-menu__item--active')

<div class="m-grid__item m-grid__item--fluid  m-grid m-grid--ver-desktop m-grid--desktop m-page__container m-body">
<!-- BEGIN: Left Aside -->

<div class="m-grid__item m-grid__item--fluid m-wrapper">
<!-- BEGIN: Subheader -->
<div class="m-subheader ">
<div class="d-flex align-items-center">
<div class="mr-auto">
<h3 class="m-subheader__title m-subheader__title--separator"> Leads Dashboard</h3>

</div>

</div>
</div>
<!-- END: Subheader -->


<div class="m-content"> 


<div class="myowndiv dashboard_list">

<div class="row">


<div class="col-sm-4">
<figure>	
<i class="fa fa-user text-success"></i>
<b class="text-muted">ALL</b>
<a href="{{route('lead.all')}}" class="text-primary">{{$count['all']}}</a>
</figure>
</div>


<div class="col-sm-4">
<figure>	
<i class="fa fa-clock text-success"></i>
<b class="text-muted">DNC</b>
<a href="{{route('lead.dnc')}}" class="text-primary">{{$count['dnc']}}</a>
</figure>
</div>



<div class="col-sm-4">
<figure>	
<i class="fa fa-paper-plane text-success"></i>
<b class="text-muted">Sold</b>
<a href="{{route('lead.sold')}}" class="text-primary">{{$count['notdnc']}}</a>
</figure>
</div>




</div>


</div>



</div>






</div>
</div>







@endsection