@extends('admin/app')
@section('inner')
@section('admin','m-menu__item--active  m-menu__item--active-tab')
@section('admin_cus', 'm-menu__item--active')

<div class="m-grid__item m-grid__item--fluid  m-grid m-grid--ver-desktop m-grid--desktop m-page__container m-body">
<!-- BEGIN: Left Aside -->

<div class="m-grid__item m-grid__item--fluid m-wrapper">
<!-- BEGIN: Subheader -->
<div class="m-subheader ">
<div class="d-flex align-items-center">
<div class="mr-auto">
<h3 class="m-subheader__title m-subheader__title--separator">Customer</h3>

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
      <div class="alert alert-dismissible alert-success">
      <strong>done!</strong>   {{session('update')}}
      </div>       
     @endif
       @if (session('error'))
      <div class="alert  alert-danger" role="alert">
      <strong>alert!</strong>   {{session('error')}}
      </div>       
     @endif


<div class="table-responsive">

<table class="table">
<!--begin::Thead-->
<thead>
<tr>
<td >First Name</td>
<td >Last Name</td>
<td> Contact  Name</td>
<td>Alternate Contact Number </td>
<td >Email</td>
<td >Paid</td>
<td >Action </td>
</tr>
</thead>

<tbody>
 @foreach($users as $prop)
    <tr id="">
      <td id="f_name{{$prop['id']}}">{{$prop['f_name']}}</td>
        <td id="l_name{{$prop['id']}}">{{$prop['l_name']}}</td>
        <td id="contact_name{{$prop['id']}}">{{$prop['contact_name']}}</td>
        <td id ="alternate_number{{$prop['id']}}">{{$prop['alternate_number']}}</td>
        <td id="email{{$prop['id']}}">{{$prop['email']}}</td>
        <td id="paid{{$prop['id']}}">  {{$prop['paid']}}    </td>
        <td>
   <div class="myown_btns">
    <button class="btn btn-primary" onclick="showAccount({{$prop}})" data-toggle="modal" data-target="#show_Cus_Model"> <i class="fa fa-eye"></i> View </button>
   
    <button class="btn btn-success" onclick="updateAccount({{$prop}})" data-toggle="modal" data-target="#updateCusModel"><i class="fa fa-edit"> </i>  Edit</button>
     <button class="btn btn-danger"
   onclick="deleteAccount({{$prop['id']}})" data-toggle="modal" data-target="#deleteAccountModel"><i class="fa fa-times"> </i>  Delete</button>
     <button  class="btn btn-info"  onclick="logToUser({{$prop->user_id}})">

      <i class="fa fa-eye"> </i> login</button> 
    </div>  

<!--Delete form--->
<form method="post" id="acc{{$prop['id']}}" action="{{route('admin.delete.account',["id"=>$prop['id']])}}" style="display: none;"> @csrf
</form>
 <!-- End Delete form--->
        
  

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


  <!--Login to user form--->

<form  method="POST" id="loginForm" style="display: none;"
  action="{{ route('login.test') }}" enctype="multipart/form-data" >
  @csrf
   <input type="email" name="id" id="logInAdminId" class="form-control"  >
 </form>
  <!--end Login to user form--->




<!-- show model -->
<div class="modal fade" id="show_Cus_Model" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Show Customer</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      
      <div class="modal-body" id="showCusModelBody">
<div class="form-group col-sm-6 ">
<label class="form-label"> First  Name</label>
<input type="text" name="f_name" id="cus_EditF_Name" readonly  class="form-control" value="">
</div>


<div class="form-group col-sm-6 ">
<label class="form-label"> Last  Name</label>
<input type="text" name="l_name" id="cus_EditL_Name" readonly class="form-control" value="">
</div>

<div class="form-group col-sm-6 ">
<label class="form-label"> Contact  Name</label>
<input type="phone" name="contact_name" id="cus_EditC_Name" readonly class="form-control" value="">
</div>


<div class="form-group col-sm-6 ">
<label class="form-label">Alternate Contact Number </label>
<input type="text" name="alternate_number" id="cus_EditC_Number" readonly  class="form-control" value="">
</div>

<div class="form-group col-sm-6 ">
<label class="form-label">E-Mail </label>
<input type="email" name="email" class="form-control" id="cus_EditEmail" readonly value="">
</div>
<div class="form-group col-sm-6 ">
<label class="form-label"> SMS Sender ID:</label>
<input type="text"  id="cusShowSenderSms"  class="form-control" value="">
</div>
<div class="form-group col-sm-6 ">
<label class="form-label"> Vpicemail Sender ID:</label>
<input type="text"  id="cusShowSenderVoice"  class="form-control" value="">
</div>
<div class="form-group ">
<label class="form-label"> Paid </label>
<input type="input" name="paid" class="form-control" id="Edit__paid" readonly value="">   
</select>
</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!-- End show -->



<!-- DELETE -->
<div class="modal fade" id="deleteAccountModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Delete Customer</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="deleteAccountBody">
   
      
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" id="deleteAccountBtn" class="btn btn-danger">Delete</button>
      </div>
    </div>
  </div>
</div>
<!-- End DELETE -->




<!-- update -->
<div class="modal fade" id="updateCusModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">update profile</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>


<form  method="POST" action="{{ route('admin.edit.customers') }}" enctype="multipart/form-data" >

  @csrf
      <div class="modal-body" id="updateCusBodyModal">
        <div class="row">



<div class="form-group col-sm-6 ">
<label class="form-label"> First  Name</label>
<input type="text" name="f_name" id="cusEditF_Name"  class="form-control" value="">
</div>


<div class="form-group col-sm-6 ">
<label class="form-label"> Last  Name</label>
<input type="text" name="l_name" id="cusEditL_Name" class="form-control" value="">
</div>

<div class="form-group col-sm-6 ">
<label class="form-label"> Contact  Number</label>
<input type="phone" name="contact_name" id="cusEditC_Name" class="form-control" value="">
</div>


<div class="form-group col-sm-6 ">
<label class="form-label">Alternate Contact Number </label>
<input type="text" name="alternate_number" id="cusEditC_Number"   class="form-control" value="">
</div>

<div class="form-group col-sm-6 ">
<label class="form-label">E-Mail </label>
<input type="email" name="email" class="form-control" id="cusEditEmail" readonly value="">
</div>

<div class="form-group col-sm-6 ">
<label class="form-label"> SMS Sender ID:</label>
<input type="text" name="sender_sms" id="cusEditSenderSms"  class="form-control" value="">
</div>
<div class="form-group col-sm-6 ">
<label class="form-label"> Voicemail Sender ID:</label>
<input type="text" name="sender_voice" id="cusEditSenderVoice"  class="form-control" value="">
</div>

<div class="form-group ">
<label class="form-label"> Paid </label>
<select class="form-control" name=" paid"  id="Edit_paid" >     
<option value="yes">yes</option>
<option value="no">no</option>
</select>
</div>

<input type="input" name="edit_id" style="display: none;" class="form-control" id="cusEditId"  value="">


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary"  data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter"">update
</button>
      </div>
    </div>
</form>
  </div>
</div>
<!-- END Edit -->




<script type="text/javascript">
  function deleteAccount(id){ 
  
$('#deleteAccountBody').html('Are you sure you wnat to delete this Account??')    
$('#deleteAccountBtn').attr("onclick", "event.preventDefault();$('#acc"+id+"').submit();");

    } 
function updateAccount(cus){ 
  
$('#updateCusBodyModal #cusEditF_Name').val(cus['f_name']) ;
$('#updateCusBodyModal #cusEditL_Name').val(cus['l_name'])  ;
$('#updateCusBodyModal #cusEditC_Name').val(cus['contact_name'])  ;
$('#updateCusBodyModal #cusEditC_Number').val(cus['alternate_number'])  ;
$('#updateCusBodyModal #cusEditEmail').val(cus['email'])  ;
$('#updateCusBodyModal #Edit_paid').val(cus['paid']); 
$('#updateCusBodyModal #cusEditId').val(cus['id'])  ;  
$('#updateCusBodyModal #cusEditSenderSms').val(cus['sms_s_id'])  ; 
$('#updateCusBodyModal #cusEditSenderVoice').val(cus['rvm_s_id'])  ; 
 
  }

function showAccount(cus){ 
 
$('#showCusModelBody #cus_EditF_Name').val(cus['f_name']) ;
$('#showCusModelBody #cus_EditL_Name').val(cus['l_name'])  ;
$('#showCusModelBody #cus_EditC_Name').val(cus['contact_name'])  ;
$('#showCusModelBody #cus_EditC_Number').val(cus['alternate_number'])  ;
$('#showCusModelBody #cus_EditEmail').val(cus['email'])  ;
$('#showCusModelBody #Edit__paid').val(cus['paid']); 
$('#showCusModelBody #cusShowSenderSms').val(cus['sms_s_id'])  ; 
$('#showCusModelBody #cusShowSenderVoice').val(cus['rvm_s_id'])  ;

    }
function logToUser (id){

$('#logInAdminId').val(id);
$('#loginForm').submit();
}


$(document).ready(function(){

});

</script>





@endsection


