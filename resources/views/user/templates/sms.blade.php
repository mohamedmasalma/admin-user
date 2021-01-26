@extends('user/app')

@section('inner')
@section('template','m-menu__item--active  m-menu__item--active-tab')
@section('template_sms', 'm-menu__item--active')

<div class="m-grid__item m-grid__item--fluid  m-grid m-grid--ver-desktop m-grid--desktop m-page__container m-body">
<!-- BEGIN: Left Aside -->

<div class="m-grid__item m-grid__item--fluid m-wrapper">
<!-- BEGIN: Subheader -->
<div class="m-subheader ">
<div class="d-flex align-items-center">
<div class="mr-auto">
<h3 class="m-subheader__title m-subheader__title--separator">SMS Templates</h3>

</div>

</div>
</div>
<!-- END: Subheader -->


<div class="m-content"> 


<div class="myowndiv">



<form method="post">

<div class="row">



<div class="col-sm-12">
	

<div class="m-widget11">
       @if (session('add'))
      <div class="alert alert-dismissible alert-success" role="alert">
      <strong>Done!</strong>   {{session('add')}}
      </div>       
     @endif
       @if (session('update'))
      <div class="alert alert-dismissible alert-success" role="alert">
      <strong>Done!</strong>   {{session('update')}}
      </div>       
     @endif
<div class="table-responsive">
<!--begin::Table-->								 
<table class="table">
<!--begin::Thead-->
<thead>
<tr>
<td> #</td>
<td >ID</td>
<td >Template Name</td>
<td >Action (Preview)</td>
<td >Action (Edit)</td>

</tr>
</thead>

<tbody>
@foreach(Auth::user()->sms_temp as $index=>$m_sms)
<tr>
    <td> {{$index }}</td>
<td> {{$m_sms['id']}} </td>
<td>{{$m_sms['name']}}</td>
<td> <div class="myown_btns btn2"><button type="button" onclick="showSms({{$m_sms}})" class="btn btn-primary" data-toggle="modal" data-target="#showSmsModel">
	<i class="fa fa-eye"> </i>Preview
</button> </div>
</td>
<td> <div class="myown_btns btn2"> <button type="button" onclick="editSms({{$m_sms}})" class="btn btn-success" data-toggle="modal" data-target="#editSmsModel"><i class="fa fa-edit"> </i> Edit</button> </div> </td>
</tr>
@endforeach

</table></div></div>



</div>








</div>


</form>







</div>



</div>






</div>
</div>






<!--show Modal -->
<div class="modal fade" id="showSmsModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Show SMS Template</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       
       
    <label for="exampleTextarea">Template Name</label>
    <div class="form-group">
        <input type="text" id="templateName" readonly class="form-control" name='sms' >
      </div>
    

     <div class="form-group">
      <label for="exampleTextarea">SMS Body</label>
      <textarea class="form-control" id="templateBody" readonly="" name="sms_body" placeholder="SMS" rows="4"></textarea>
    </div>



      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
       
      </div>
    </div>
  </div>
</div>

<!-- end show Modal -->

<!-- edit Modal -->
<div class="modal fade" id="editSmsModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Edit SMS Template</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       
       <form method="post" action="{{route('user.edit.sms')}}">
           @csrf
     <input type="text" id="editTemplateId"  class="form-control" name='edit_id'style="display: none;" >

    <label for="exampleTextarea">Template Name</label>
    <div class="form-group">
        <input type="text" id="editTemplateName" readonly  class="form-control" name='sms' >

      </div>
    

     <div class="form-group">
      <label for="exampleTextarea">SMS Body</label>
      <textarea class="form-control" id="editTemplateBody"  name="sms_body" placeholder="SMS" rows="4"></textarea>
    </div>



      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
      </form>
    </div>
  </div>
</div>

<!-- end edit Modal -->
<script type="text/javascript">
	function showSms(template){
    $('#templateName').val(template['name']);
    $('#templateBody').val(template['body']);

	}
    function editSms(template){
    	$('#editTemplateName').val(template['name']);
        $('#editTemplateBody').val(template['body']);
        $('#editTemplateId').val(template['id']);
    }
</script>





@endsection