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
                    <li><a href="{{ route('cabinet.offsiteBackup') }}"> Cabinet Allocation - Interfaces</a></li>
                    <li class="active">Edit Interface</li>
                </ol>
</section>

<!-- Main content -->
<section class="content paddingleft_right15">
    <div class="row">
        <div class="col-12">
        <div class="card panel-primary ">
            <div class="card-heading cardBackground">
                <h4 class="card-title float-left"> <i class="livicon" data-name="file-import" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>
                    Edit Offsite Interface
                </h4>
            </div>
            <div class="card-body">

            <form class="form-horizontal" action="{{ route('interface.update', $interface->id) }}" method="post">
            {{ method_field('post') }}
            {{ csrf_field() }}
            <div class="form-group">
                    <div class="row">
                        <label class="offset-sm-3 col-md-2 col-sm-2 control-label" for="customer">Customer</label>
                        <div class="col-md-4 col-sm-4">
                            <input id="customer" name="customer" class="form-control" type="text" placeholder="Customer" value="{{ $interface->customer }}">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <label class="offset-sm-3 col-md-2 col-sm-2 control-label" for="short_code">Short Code</label>
                        <div class="col-md-4 col-sm-4">
                            <input id="short_code" name="short_code" class="form-control" type="text" placeholder="Short Code" value="{{ $interface->short_code }}">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <label class="offset-sm-3 col-md-2 col-sm-2 control-label" for="vlan">VLAN</label>
                        <div class="col-md-4 col-sm-4">
                            <input id="vlan" name="vlan" class="form-control" type="text" placeholder="VLAN" value="{{ $interface->vlan }}">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <label class="offset-sm-3 col-md-2 col-sm-2 control-label" for="interface">Interface</label>
                        <div class="col-md-4 col-sm-4">
                            <input id="interface" name="interface" class="form-control" type="text" placeholder="Interface" value="{{ $interface->interface }}">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <label class="offset-sm-3 col-md-2 col-sm-2 control-label" for="subnet">Subnet</label>
                        <div class="col-md-4 col-sm-4">
                            <input id="subnet" name="subnet" class="form-control" type="text" placeholder="Subnet" value="{{ $interface->subnet }}">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="offset-sm-5 col-sm-9">
                        <button type="submit" class="btn btn-primary">Update Interface</button>
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
