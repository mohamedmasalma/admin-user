
@extends('admin/app')

@section('inner')
@section('lead','m-menu__item--active  m-menu__item--active-tab')
@section('lead_import', 'm-menu__item--active')

<div class="m-grid__item m-grid__item--fluid  m-grid m-grid--ver-desktop m-grid--desktop m-page__container m-body">
<!-- BEGIN: Left Aside -->

<div class="m-grid__item m-grid__item--fluid m-wrapper">
<!-- BEGIN: Subheader -->
<div class="m-subheader ">
<div class="d-flex align-items-center">
<div class="mr-auto">
<h3 class="m-subheader__title m-subheader__title--separator">Import</h3>

</div>

</div>
</div>
<!-- END: Subheader -->


<div class="m-content"> 

 @if (session('created'))
      <div class="alert  alert-success" role="alert">
      <strong>done!</strong>   {{session('created')}}
      </div>       
     @endif
     @if (session('error'))
      <div class="alert  alert-danger" role="alert">
      <strong>alert!</strong>   {{session('error')}}
      </div>       
     @endif
<div class="myowndiv">

<p>You can import your leads in bulk by uploading a formatted CSV file here.
<a href="{{route('download.csv')}}">Click here​  </a> to download the CSV template</p>

<div class="panel-body">
                        <form class="form-horizontal" method="POST" action="{{route('parse.import')}}" enctype="multipart/form-data">
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('csv_file') ? ' has-error' : '' }}">
                                <label for="csv_file" class="col-md-4 control-label">CSV file to import</label>

                                <div class="col-md-6">
                                    <input id="csv_file" type="file" class="form-control" name="csv_file" >

                                    @if ($errors->has('csv_file'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('csv_file') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="header" checked> File contains header row?
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-8 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        Parse CSV
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
           

  



</div>



</div>






</div>
</div>
@endsection








