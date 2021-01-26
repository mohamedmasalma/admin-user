
@extends('user/app')

@section('inner')
@section('template','m-menu__item--active  m-menu__item--active-tab')
@section('template_email', 'm-menu__item--active')
<div class="m-grid__item m-grid__item--fluid  m-grid m-grid--ver-desktop m-grid--desktop m-page__container m-body">
<!-- BEGIN: Left Aside -->

<div class="m-grid__item m-grid__item--fluid m-wrapper">
<!-- BEGIN: Subheader -->
<div class="m-subheader ">
<div class="d-flex align-items-center">
<div class="mr-auto">
<h3 class="m-subheader__title m-subheader__title--separator">E-Mail Templates</h3>

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
  <td >#</td>
<td >ID</td>
<td >Template Name</td>
<td >Action (Preview)</td>
<td >Action (Edit)</td>

</tr>
</thead>

<tbody>
@foreach(Auth::user()->email_temp as $index=>$email)
<tr>
<td> {{$index }}</td>
<td> {{$email['id']}} </td>
<td>{{$email['name']}}</td>
<td> <div class="myown_btns btn2"><button type="button" onclick="showEmail({{$email}})" class="btn btn-primary" data-toggle="modal" data-target="#showEmailModel">
	<i class="fa fa-eye"> </i>Preview
</button> </div>
</td>
<td> <div class="myown_btns btn2"> <button type="button" onclick="editEmail({{$email}})" class="btn btn-success" data-toggle="modal" data-target="#editEmailModel"><i class="fa fa-edit"> </i> Edit</button> </div> </td>
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
<div class="modal fade" id="showEmailModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Show E-mail Template</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       
       
    <label for="exampleTextarea">Template Name</label>
    <div class="form-group">
        <input type="text" id="templateName" readonly class="form-control" name='Email' >
      </div>
    
    <label for="exampleTextarea">E-Mail Subject</label>
    <div class="form-group">
        <input type="text" id="showTemplateSubject" readonly class="form-control"  >
      </div>
    

     <div class="form-group">
      <label for="exampleTextarea">Email Body</label>
      <textarea class="form-control" id="templateBody" readonly="" name="Email_body" placeholder="Email" rows="4"></textarea>
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
<div class="modal fade" id="editEmailModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Edit E-mail template</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       
       <form method="post" action="{{route('user.edit.email')}}">
           @csrf
     <input type="text" id="editTemplateId"  class="form-control" name='edit_id'style="display: none;" >

    <label for="exampleTextarea">Template Name</label>
    <div class="form-group">
        <input type="text" id="editTemplateName" readonly  class="form-control" name='email' >

      </div>

      <label for="exampleTextarea">E-Mail Subject</label>
    <div class="form-group">
        <input type="text" id="editTemplateSubject"  class="form-control" name='EmailSub' >
      </div>
    
    

     <div class="form-group">
      <label for="exampleTextarea">Email Body</label>
      <textarea class="form-control" id="editTemplateBody"  name="email_body" placeholder="Email" rows="4"></textarea>
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
	function showEmail(template){
    $('#templateName').val(template['name']);
    $('#templateBody').val(template['body']);
    $('#showTemplateSubject').val(template['subject']);

	}
    function editEmail(template){
    	$('#editTemplateName').val(template['name']);
      $('#editTemplateBody').val(template['body']);
      $('#editTemplateId').val(template['id']);
      $('#editTemplateSubject').val(template['subject']);
    }
</script>




@endsection