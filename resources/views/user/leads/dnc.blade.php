@extends('user/app')

@section('inner')
@section('lead','m-menu__item--active  m-menu__item--active-tab')
@section('lead_dnc', 'm-menu__item--active')

<div class="m-grid__item m-grid__item--fluid  m-grid m-grid--ver-desktop m-grid--desktop m-page__container m-body">
<!-- BEGIN: Left Aside -->

<div class="m-grid__item m-grid__item--fluid m-wrapper">
<!-- BEGIN: Subheader -->
<div class="m-subheader ">
<div class="d-flex align-items-center">
<div class="mr-auto">
<h3 class="m-subheader__title m-subheader__title--separator">DNC</h3>

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
      <div class="alert alert-dismissible alert-success">
      <strong>Done!</strong>   {{session('delete')}}
      </div>       
     @endif
       @if (session('update'))
      <div class="alert alert-dismissible alert-sucsess">
      <strong>Done!</strong>   {{session('update')}}
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

@foreach($dncs as $dnc)
<tr>
<td>{{ $dnc['f_name']}} </td>
<td>{{ $dnc['l_name']}}</td>
<td>{{ $dnc['email']}}</td>
<td>{{$dnc['phone']}}</td>
<td>{{$dnc['phone_type']}}</td>

<td> <div class="myown_btns"> <button class="btn btn-danger" onclick="deletednc({{$dnc['id']}})" data-toggle="modal" data-target="#deleteModel"><i class="fa fa-times"> </i>  Delete</button>     </div> 
<form method="post" id="dnc{{$dnc['id']}}" action="{{route('user.delete.dnc',["id"=>$dnc['id']])}}" style="display: none;"> @csrf</form>
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
        <h5 class="modal-title" id="exampleModalCenterTitle">Delelte DNC</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="deleteDncBody">
       
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" id="deleteDncBtn" class="btn btn-danger">Delete</button>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
	function deletednc(id){ 
  
$('#deleteDncBody').html('Are you sure you want to remove this line from DNC??')    
$('#deleteDncBtn').attr("onclick", "event.preventDefault();$('#dnc"+id+"').submit();");

		}
$(document).ready(function(){

});

</script>
<!-- END DELETE -->






@endsection