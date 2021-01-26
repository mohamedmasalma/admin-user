@extends('admin/app')

@section('inner')
@section('lead','m-menu__item--active  m-menu__item--active-tab')
@section('lead_sold', 'm-menu__item--active')

<div class="m-grid__item m-grid__item--fluid  m-grid m-grid--ver-desktop m-grid--desktop m-page__container m-body">
<!-- BEGIN: Left Aside -->

<div class="m-grid__item m-grid__item--fluid m-wrapper">
<!-- BEGIN: Subheader -->
<div class="m-subheader ">
<div class="d-flex align-items-center">
<div class="mr-auto">
<h3 class="m-subheader__title m-subheader__title--separator">Sold</h3>

</div>

</div>
</div>
<!-- END: Subheader -->


<div class="m-content"> 


<div class="myowndiv">

<div class="row">



<div class="col-sm-12">
  

<div class="m-widget11">
  @if (session('delete'))
      <div class="alert alert-dismissible alert-danger">
      <strong>done!</strong>   {{session('delete')}}
      </div>       
     @endif
       @if (session('update'))
      <div class="alert alert-dismissible alert-sucsess">
      <strong>done!</strong>   {{session('update')}}
      </div>       
     @endif
<div class="table-responsive">

<table class="table">
<!--begin::Thead-->

<thead>
<tr>

<td >First Name</td>
<td >Last Name</td>
<td >Email</td>
<td >Phone Number</td>
<td >Phone Type</td>
<td >Action </td>
</tr>
</thead>

<tbody>

@foreach($solds as $sold)
<tr>
<td>{{ $sold['f_name']}} </td>
<td>{{ $sold['l_name']}}</td>
<td>{{ $sold['email']}}</td>
<td>{{$sold['phone']}}</td>
<td>{{$sold['phone_type']}}</td>

<td> <div class="myown_btns"> <button class="btn btn-danger" onclick="deleteSold({{$sold['id']}})" data-toggle="modal" data-target="#deleteSoldModel"><i class="fa fa-times"> </i>  Delete</button>     </div> 
<form method="post" id="sold{{$sold['id']}}" action="{{route('admin.delete.sold',["id"=>$sold['id']])}}" style="display: none;"> @csrf</form>
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





<!-- DELETE modal -->
<div class="modal fade" id="deleteSoldModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Delete Sold</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="deleteSoldBody">
       
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" id="deleteSoldBtn" class="btn btn-danger">Delete</button>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
	function deleteSold(id){ 
  
$('#deleteSoldBody').html('are you sure you want to remove this line from Sold')    
$('#deleteSoldBtn').attr("onclick", "event.preventDefault();$('#sold"+id+"').submit();");

		}
$(document).ready(function(){

});

</script>
<!-- END DELETE -->





@endsection