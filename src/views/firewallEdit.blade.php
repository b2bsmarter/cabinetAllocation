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
                    <li><a href="{{ route('cabinet.firewall') }}"> Cabinet Allocation - Firewalls</a></li>
                    <li class="active">Edit Firewall</li>
                </ol>
</section>

<!-- Main content -->
<section class="content paddingleft_right15">
    <div class="row">
        <div class="col-12">
        <div class="card panel-primary ">
            <div class="card-heading cardBackground">
                <h4 class="card-title float-left"> <i class="livicon" data-name="file-import" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>
                    Edit Firewall
                </h4>
            </div>
            <div class="card-body">

            <form class="form-horizontal" action="{{ route('firewall.update', $firewall->id) }}" method="post">
            {{ method_field('post') }}
            {{ csrf_field() }}
                <div class="form-group">
                    <div class="row">
                        <label class="offset-sm-3 col-md-2 col-sm-2 control-label" for="source_interface">Source Interface</label>
                        <div class="col-md-4 col-sm-4">
                            <input id="source_interface" name="source_interface" class="form-control" type="text" placeholder="Source Interface" value="{{ $firewall->source_interface }}">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <label class="offset-sm-3 col-md-2 col-sm-2 control-label" for="source_ip">Source IP</label>
                        <div class="col-md-4 col-sm-4">
                            <input id="source_ip" name="source_ip" class="form-control" type="text" placeholder="Source IP" value="{{ $firewall->source_ip }}">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <label class="offset-sm-3 col-md-2 col-sm-2 control-label" for="source_name">Source Name</label>
                        <div class="col-md-4 col-sm-4">
                            <input id="source_name" name="source_name" class="form-control" type="text" placeholder="Source Name" value="{{ $firewall->source_name }}">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <label class="offset-sm-3 col-md-2 col-sm-2 control-label" for="destination_interface">Destination Interface</label>
                        <div class="col-md-4 col-sm-4">
                            <input id="destination_interface" name="destination_interface" class="form-control" type="text" placeholder="Destination Interface" value="{{ $firewall->destination_interface }}">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <label class="offset-sm-3 col-md-2 col-sm-2 control-label" for="destination_address">Destination Address</label>
                        <div class="col-md-4 col-sm-4">
                            <input id="destination_address" name="destination_address" class="form-control" type="text" placeholder="Destination Address" value="{{ $firewall->destination_address }}">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <label class="offset-sm-3 col-md-2 col-sm-2 control-label" for="service_port">Service Port</label>
                        <div class="col-md-4 col-sm-4">
                            <input id="service_port" name="service_port" class="form-control" type="text" placeholder="Service Port" value="{{ $firewall->service_port }}">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <label class="offset-sm-3 col-md-2 col-sm-2 control-label" for="service_name">Service Name</label>
                        <div class="col-md-4 col-sm-4">
                            <input id="service_name" name="service_name" class="form-control" type="text" placeholder="Service Name" value="{{ $firewall->service_name }}">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <label class="offset-sm-3 col-md-2 col-sm-2 control-label" for="source_nat_type">Source NAT Type</label>
                        <div class="col-md-4 col-sm-4">
                            <input id="source_nat_type" name="source_nat_type" class="form-control" type="text" placeholder="Source NAT Type" value="{{ $firewall->source_nat_type }}">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <label class="offset-sm-3 col-md-2 col-sm-2 control-label" for="translated_source_address">Translated Source Address</label>
                        <div class="col-md-4 col-sm-4">
                            <input id="translated_source_address" name="translated_source_address" class="form-control" type="text" placeholder="Translated Source Address" value="{{ $firewall->translated_source_address }}">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <label class="offset-sm-3 col-md-2 col-sm-2 control-label" for="translated_destination_address">Translated Destination Address</label>
                        <div class="col-md-4 col-sm-4">
                            <input id="translated_destination_address" name="translated_destination_address" class="form-control" type="text" placeholder="Translated Destination Address" value="{{ $firewall->translated_destination_address }}">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <label class="offset-sm-3 col-md-2 col-sm-2 control-label" for="translated_service_port">Translated Service Port</label>
                        <div class="col-md-4 col-sm-4">
                            <input id="translated_service_port" name="translated_service_port" class="form-control" type="text" placeholder="Translated Service Port" value="{{ $firewall->translated_service_port }}">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <label class="offset-sm-3 col-md-2 col-sm-2 control-label" for="translated_service_name">Translated Service Name</label>
                        <div class="col-md-4 col-sm-4">
                            <input id="translated_service_name" name="translated_service_name" class="form-control" type="text" placeholder="Translated Service Name" value="{{ $firewall->translated_service_name }}">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <label class="offset-sm-3 col-md-2 col-sm-2 control-label" for="description">Description</label>
                        <div class="col-md-4 col-sm-4">
                            <input id="description" name="description" class="form-control" type="text" placeholder="Description" value="{{ $firewall->description }}">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="offset-sm-5 col-sm-9">
                        <button type="submit" class="btn btn-primary">Edit Firewall</button>
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
