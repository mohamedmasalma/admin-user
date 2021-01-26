@extends('admin/app')

@section('inner')
@section('template','m-menu__item--active  m-menu__item--active-tab')
@section('add_template', 'm-menu__item--active')
<div class="m-grid__item m-grid__item--fluid  m-grid m-grid--ver-desktop m-grid--desktop m-page__container m-body">
<!-- BEGIN: Left Aside -->

<div class="m-grid__item m-grid__item--fluid m-wrapper">
<!-- BEGIN: Subheader -->
<div class="m-subheader ">
<div class="d-flex align-items-center">
<div class="mr-auto">
<h3 class="m-subheader__title m-subheader__title--separator">Add Templates</h3>

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
      <strong>done!</strong>   {{session('add')}}
      </div>       
     @endif
      @if (session('error'))
      <div class="alert alert-dismissible alert-success" role="alert">
      <strong>alert!</strong>   {{session('error')}}
      </div>       
     @endif

<div class="row">
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary col-2 offset-1 "  data-toggle="modal" data-target="#smsModal">
Add sms
</button>
<!-- Button trigger modal -->
<button type="button" class="btn btn-success col-2 offset-1 " data-toggle="modal" data-target="#emailModal">
Add email
</button>

<button type="button" class="btn btn-info col-2 offset-1" data-toggle="modal" data-target="#uploadModal">
Upload Voice File
</button>
</div>


</div></div>



</div>








</div>


</form>







</div>



</div>






</div>
</div>


<!-- E-mail Modal -->
<div class="modal fade" id="emailModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Add E-mail Template </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form method="post"  action="{{route('add.email')}}">
        @csrf

         <label for="exampleTextarea">Template Name</label>
    <div class="form-group">
        <input type="text"  class="form-control" name='email' >
      </div>

      <label for="exampleTextarea">E-Mail Subject</label>
    <div class="form-group">
        <input type="text" id="addTemplateSubject"  class="form-control" placeholder="subject" name='EmailSub' >
      </div>

       <div class="form-group">
      <label for="exampleTextarea">Add Email</label>
      <textarea class="form-control" id="exampleTextarea" name="email_body" placeholder="E_mail" rows="4"></textarea>
    </div>
      

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Add</button>
      </div>
     </form>
    </div>
  </div>
</div>


<!--Sms Modal -->
<div class="modal fade" id="smsModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Add SMS Template </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <form method="post"  action="{{route('add.sms')}}">
        @csrf
    <label for="exampleTextarea">Template Name</label>
    <div class="form-group">
        <input type="text"  class="form-control" name='sms' >
      </div>
    

     <div class="form-group">
      <label for="exampleTextarea">SMS Body</label>
      <textarea class="form-control" id="exampleTextarea" name="sms_body" placeholder="SMS" rows="4"></textarea>
    </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Add</button>
      </div>
      </form>
    </div>
  </div>
</div>


<!--Sms Modal -->
<div class="modal fade" id="uploadModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Voicemail Upload </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div class="panel-body">
                        <form class="form-horizontal" method="POST" action="{{route('upload.voicemail')}}" enctype="multipart/form-data">
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('csv_file') ? ' has-error' : '' }}">
                                
                                <label for="exampleTextarea">Template Name</label>
                                <div class="form-group">
                                <input type="text"  class="form-control" required name='name' >
                                </div>
                                <label for="csv_file" class="col-md-4 control-label">MP3 File To Upload</label>
                                <div class="col-md-6">
                                    <input id="mp3_file" type="file" class="form-control" name="mp3_file" >

                                    @if ($errors->has('csv_file'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('csv_file') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>


                            <div class="form-group">
                                <div class="col-md-8 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                       Upload
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
    </div>
  </div>
</div>



@endsection