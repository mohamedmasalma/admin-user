@extends('admin/app')

@section('inner')
@section('lead','m-menu__item--active  m-menu__item--active-tab')
@section('lead_all', 'm-menu__item--active')

<div class="m-grid__item m-grid__item--fluid  m-grid m-grid--ver-desktop m-grid--desktop m-page__container m-body">
<!-- BEGIN: Left Aside -->

<div class="m-grid__item m-grid__item--fluid m-wrapper">
<!-- BEGIN: Subheader -->
<div class="m-subheader ">
<div class="d-flex align-items-center">
<div class="mr-auto">
<h3 class="m-subheader__title m-subheader__title--separator">Leads</h3>

</div>

</div>
</div>
<!-- END: Subheader -->


<div class="m-content"> 


<div class="myowndiv">

<div class="row">



<div class="col-sm-12">
  

<div class="m-widget11">
   @if (session('created'))
      <div class="alert  alert-success" role="alert">
      <strong>alert!</strong>   {{session('created')}}
      </div>       
     @endif
  @if (session('delete'))
      <div class="alert alert-dismissible alert-danger">
      <strong>done!</strong>   {{session('delete')}}
      </div>       
     @endif
       @if (session('update'))
      <div class="alert alert-dismissible alert-success">
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

 @foreach($leads as $lead)
    <tr>
      <td>{{$lead['f_name']}}</td>
        <td>{{$lead['l_name']}}</td>
        <td>{{$lead['email']}}</td>
        <td>{{$lead['phone']}}</td>
        <td>{{$lead['phone_type']}}</td>
  <td>
  <button class="btn btn-primary" data-toggle="modal" data-target="#showLeadModel" onclick="showLead({{$lead}})"data-target="#showLeadModel"><i class="fa fa-eye"> </i> View </button>
    <button class="btn btn-success" data-toggle="modal" onclick="updatelead({{$lead}})" data-target="#updateLeadModel"><i class="fa fa-edit"> </i>  Edit</button>
     <button class="btn btn-danger"
	 onclick="deletelead({{$lead['id']}})" data-toggle="modal" data-target="#deleteLeadModel"><i class="fa fa-times"> </i>  Delete</button>

	</div> 
<form method="post" id="lead{{$lead['id']}}" action="{{route('admin.delete.lead',["id"=>$lead['id']])}}" style="display: none;"> @csrf</form>
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
<div class="modal fade" id="deleteLeadModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Delete Lead</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="deleteLeadBody">
      
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" id="deleteLeadBtn" class="btn btn-danger">Delete</button>
      </div>
    </div>
  </div>
</div>
<!-- End DELETE -->


<!-- update -->

<div class="modal fade" id="updateLeadModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Edit Lead</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="updateLeadBody">

<form  method="POST" action="{{ route('admin.update.lead') }}" enctype="multipart/form-data" >

  @csrf
  <input type="hidden" name="edit_id" id="edit_id" class="form-control">
<div class="row">
<div class="form-group col-sm-6 ">
<label class="form-label"> First  Name</label>
<input type="text" name="f_name" id="f_name" class="form-control">
</div>

<div class="form-group col-sm-6 ">
<label class="form-label"> Last  Name</label>
<input type="text" name="l_name" id="l_name" class="form-control">
</div>



<div class="form-group col-sm-6 ">
<label class="form-label"> Phone  Name</label>
<input type="text" name="phone" id="phone" class="form-control">
</div>


<div class="form-group col-sm-6 ">
<label class="form-label"> Phone  Type</label>
<select name="phone_type" id="phone_type" class="form-control">
<option id="cell" value="Cell" > Cell</option>
<option  id="landline" value="Landline" > Landline</option>
</select>

</div>

<div class="form-group col-sm-12 ">
<label class="form-label"> E-Mail</label>
<input type="mail" id="email" name="email" class="form-control">
</div>

<div class="form-check-inline" style="margin-bottom: 10px">
<label class="form-check-label">
<input type="checkbox" name="dnc" id="check_dnc" class="form-check-input" value="on">DNC
</label>
</div>
<div class="form-check-inline" style="margin-bottom: 10px">
<label class="form-check-label">
<input type="checkbox" name="sold" id="check_sold" class="form-check-input" value="on">Sold
</label>
</div>

<div class="form-group  col-sm-12">


</div>

</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" id="updateLeadBtn" class="btn btn-success">Update</button>
      </div>
      </form>
    </div>
  </div>
</div>
<!-- End update -->

<!-- Show -->
<div class="modal fade" id="showLeadModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Show Lead</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="showLeadBody">
       <div class="form-group">
      <label for="exampleInputEmail1">first name </label>
      <p  class="form-text text-muted" id="f_name"></p>
       <input type="text" class="form-control" readonly id="f_name" placeholder="first name">
    </div>
     
       <div class="form-group">
        <label for="exampleInputEmail1">last name</label>
       <input type="text" class="form-control" readonly id="l_name" placeholder="last name">
    </div>
     
        <div class="form-group">
        <label for="exampleInputEmail1">email</label>
        <input type="text" class="form-control" readonly id="email" placeholder="email">
    </div>
      
       <div class="form-group">
        <label for="exampleInputEmail1">phone</label>
        <input type="text" class="form-control" readonly id="phone" placeholder="phone">
    </div>
     
        <div class="form-group">
        <label for="exampleInputEmail1">phone type</label>
        <input type="text" class="form-control" readonly id="phone_type" placeholder="phone type">
  
    </div>
   
        <div class="form-group">
        <label for="exampleInputEmail1">dnc</label>
        <input type="text" class="form-control" readonly id="dnc" placeholder="...">
      
    </div>
      
        <div class="form-group">
          <label for="exampleInputEmail1">sold</label>
          <input type="text" class="form-control" readonly id="sold" placeholder="...">

    </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">


    function showLead(lead){ 
  
$('#showLeadBody #f_name').val(lead['f_name']) ;
$('#showLeadBody #l_name').val(lead['l_name'])  ;
$('#showLeadBody #email').val(lead['email'])  ;
$('#showLeadBody #phone').val(lead['phone'])  ;
$('#showLeadBody #phone_type').val(lead['phone_type'])  ;
$('#showLeadBody #dnc').val(lead['dnc'])  ; 
$('#showLeadBody #sold').val(lead['sold'])  ;   

    }
	function deletelead(id){ 
  
$('#deleteLeadBody').html('are you sure you wantt to delete this lead')    
$('#deleteLeadBtn').attr("onclick", "event.preventDefault();$('#lead"+id+"').submit();");

		}
function updatelead(lead){ 
if(lead['dnc']=='yes'){$('#check_dnc').attr('checked', true);}
  if(lead['sold']=='yes'){$('#check_sold').attr('checked', true);}
  if(lead['phone_type']=='Cell'){$('#cell').attr('selected', 'select');}
  if(lead['sold']=='Landing'){$('#check_sold').attr('selected', 'select');}
$('#updateLeadBody #edit_id').val(lead['id']) ;
$('#updateLeadBody #f_name').val(lead['f_name']) ;
$('#updateLeadBody #l_name').val(lead['l_name'])  ;
$('#updateLeadBody #email').val(lead['email'])  ;
$('#updateLeadBody #phone').val(lead['phone'])  ;
$('#updateLeadBody #phone_type').val(lead['phone_type'])  ;
$('#updateLeadBody #dnc').val(lead['dnc'])  ; 
$('#updateLeadBody #sold').val(lead['sold'])  ; 

    }
$(document).ready(function(){

});

</script>




@endsection