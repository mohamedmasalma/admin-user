@extends('admin/app')

@section('inner')
@section('template','m-menu__item--active  m-menu__item--active-tab')
@section('template_voicemail', 'm-menu__item--active')



<div class="m-grid__item m-grid__item--fluid  m-grid m-grid--ver-desktop m-grid--desktop m-page__container m-body">
<!-- BEGIN: Left Aside -->

<div class="m-grid__item m-grid__item--fluid m-wrapper">
<!-- BEGIN: Subheader -->
<div class="m-subheader ">
<div class="d-flex align-items-center">
<div class="mr-auto">
<h3 class="m-subheader__title m-subheader__title--separator">	Ringless Voicemail Templates</h3>

</div>

</div>
</div>
<!-- END: Subheader -->


<div class="m-content"> 


<div class="myowndiv">
 @if (session('add'))
      <div class="alert alert-dismissible alert-success" role="alert">
      <strong>done!</strong>   {{session('add')}}
      </div>       
     @endif
       @if (session('delete'))
      <div class="alert alert-dismissible alert-danger" role="alert">
      <strong>done!</strong>   {{session('delete')}}
      </div>       
     @endif


<form method="post">

<div class="row">



<div class="col-sm-12">
	

<div class="m-widget11">
<div class="table-responsive">
<!--begin::Table-->								 
<table class="table">
<!--begin::Thead-->
<thead>
<tr>
<td >#</td>
<td >ID</td>
<td >Template Name</td>
<td >Action (Play)</td>
<td >Action (Delete)</td>

</tr>
</thead>

<tbody>
@foreach($voices as $index=>$voicemail)
<tr>
<td>{{$index}}</td>
<td> {{$voicemail['id']}} </td>
<td> {{$voicemail['name']}}</td>
<td> <div class="myown_btns btn2">
<audio controls >
  <source src=" {{asset($voicemail['path'])}}" type="audio/mpeg">
</audio>
</div></td>
<td> <div class="myown_btns btn2">  <!-- Button trigger modal -->
<button type="button" onclick="deleteVoice({{$voicemail['id']}})" class="btn btn-danger" data-toggle="modal" data-target="#deleteVoiceModel">
Delete
</button></div> </td>
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

<!--delete Modal -->


<!-- Modal -->
<div class="modal fade" id="deleteVoiceModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Delete Voicemail</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" action="{{route('delete.voicemail')}}">
      <div class="modal-body">
       are you sure?
           @csrf
     <input type="text" id="voiceEditTd"  class="form-control" name='edit_id'style="display: none;" >
       
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-danger">Delete</button>
      </div>
     </form>
    </div>
  </div>
</div>
<!-- end delete Modal -->
<script type="text/javascript">
	function deleteVoice(id){
    $('#voiceEditTd').val(id);

	}
   
</script>


@endsection