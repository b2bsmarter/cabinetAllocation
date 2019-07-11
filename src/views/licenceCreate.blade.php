@extends('layouts/default')

{{-- Page title --}}
@section('title')
Cabinet Allocation
@parent
@stop

{{-- page level styles --}}
@section('header_styles')

@stop

{{-- Page content --}}
@section('content')

<section class="content-header">
                <h1>Cabinet Allocation</h1>
                <ol class="breadcrumb">
                    <li>
                        <a href="{{ route('dashboard') }}">
                            <i class="livicon" data-name="home" data-size="14" data-color="#000"></i>
                            Dashboard
                        </a>
                    </li>
                    <li><a href="{{ route('cabinet.licence') }}"> Cabinet Allocation - Licences</a></li>
                    <li class="active">Create Licence</li>
                </ol>
</section>

<!-- Main content -->
<section class="content paddingleft_right15">
    <div class="row">
        <div class="col-12">
        <div class="card panel-primary ">
            <div class="card-heading cardBackground">
                <h4 class="card-title float-left"> <i class="livicon" data-name="file-import" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>
                    Create Licence
                </h4>
            </div>
            <div class="card-body">

            <form class="form-horizontal" action="{{ route('licence.store') }}" method="post">
            {{ method_field('post') }}
            {{ csrf_field() }}
                <div class="form-group">
                    <div class="row">
                        <label class="offset-sm-3 col-md-2 col-sm-2 control-label" for="licence_server">Server</label>
                        <div class="col-md-4 col-sm-4">
                            <input id="licence_server" name="licence_server" class="form-control" type="text" placeholder="Server">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <label class="offset-sm-3 col-md-2 col-sm-2 control-label" for="licence">Licence</label>
                        <div class="col-md-4 col-sm-4">
                            <input id="licence" name="licence" class="form-control" type="text" placeholder="Licence">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <label class="offset-sm-3 col-md-2 col-sm-2 control-label" for="licence_type">Licence Type</label>
                        <div class="col-md-4 col-sm-4">
                            <input id="licence_type" name="licence_type" class="form-control" type="text" placeholder="Licence Type">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <label class="offset-sm-3 col-md-2 col-sm-2 control-label" for="lic_number">LIC-Number</label>
                        <div class="col-md-4 col-sm-4">
                            <input id="lic_number" name="lic_number" class="form-control" type="text" placeholder="LIC-Number">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="offset-sm-5 col-sm-9">
                        <button type="submit" class="btn btn-primary">Create Licence</button>
                    </div>
                </div>

            </form>
                
            </div>
        </div>
    </div>
    </div><!-- row-->
</section>


@stop

{{-- page level scripts --}}
@section('footer_scripts')
<script type="text/javascript" src="{{ asset('assets/vendors/datatables/js/jquery.dataTables.js') }}" ></script>
<script>


</script>
@stop
