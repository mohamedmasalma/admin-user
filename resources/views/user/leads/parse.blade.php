 @extends('user/app')

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


<div class="myowndiv">

<form class="form-horizontal" method="POST" action="{{route('user.final.import')}}">
                            {{ csrf_field() }}
                            <input type="hidden" name="csv_data_file_id" value="{{$id}}" />

                            <table class="table">
                              
                                @foreach ($csv_data as $row)
                                    <tr>
                                    @foreach ($row as $key => $value)
                                        <td>{{ $value }}</td>
                                    @endforeach
                                    </tr>
                                @endforeach
                              
                            </table>

                            <button type="submit" class="btn btn-primary">
                                Import Data
                            </button>
                        </form>
           

  



</div>



</div>






</div>
</div>

@endsection
