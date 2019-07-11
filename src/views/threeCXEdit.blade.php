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
                    <li><a href="{{ route('cabinet.offsiteBackup') }}"> Cabinet Allocation - 3CXs</a></li>
                    <li class="active">Edit 3CX</li>
                </ol>
</section>

<!-- Main content -->
<section class="content paddingleft_right15">
    <div class="row">
        <div class="col-12">
        <div class="card panel-primary ">
            <div class="card-heading cardBackground">
                <h4 class="card-title float-left"> <i class="livicon" data-name="file-import" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>
                    Edit 3CX
                </h4>
            </div>
            <div class="card-body">

            <form class="form-horizontal" action="{{ route('threeCX.update', $threeCX->id) }}" method="post">
            {{ method_field('post') }}
            {{ csrf_field() }}
                <div class="form-group">
                    <div class="row">
                        <label class="offset-sm-3 col-md-2 col-sm-2 control-label" for="customer">Customer</label>
                        <div class="col-md-4 col-sm-4">
                            <input id="customer" name="customer" class="form-control" type="text" placeholder="Customer" value="{{ $threeCX->customer }}">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <label class="offset-sm-3 col-md-2 col-sm-2 control-label" for="server_name">Server Name</label>
                        <div class="col-md-4 col-sm-4">
                            <input id="server_name" name="server_name" class="form-control" type="text" placeholder="Server Name" value="{{ $threeCX->server_name }}">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <label class="offset-sm-3 col-md-2 col-sm-2 control-label" for="ip_address">IP Address</label>
                        <div class="col-md-4 col-sm-4">
                            <input id="ip_address" name="ip_address" class="form-control" type="text" placeholder="IP Address" value="{{ $threeCX->ip_address }}">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <label class="offset-sm-3 col-md-2 col-sm-2 control-label" for="hdd">HDD</label>
                        <div class="col-md-4 col-sm-4">
                            <input id="hdd" name="hdd" class="form-control" type="text" placeholder="HDD" value="{{ $threeCX->hdd }}">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <label class="offset-sm-3 col-md-2 col-sm-2 control-label" for="call_recording">Call Recording</label>
                        <div class="col-md-4 col-sm-4">
                            <input id="call_recording" name="call_recording" class="form-control" type="text" placeholder="Call Recording" value="{{ $threeCX->call_recording }}">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <label class="offset-sm-3 col-md-2 col-sm-2 control-label" for="fqdn">FQDN</label>
                        <div class="col-md-4 col-sm-4">
                            <input id="fqdn" name="fqdn" class="form-control" type="text" placeholder="FQDN" value="{{ $threeCX->fqdn }}">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <label class="offset-sm-3 col-md-2 col-sm-2 control-label" for="management_port">Management Port</label>
                        <div class="col-md-4 col-sm-4">
                            <input id="management_port" name="management_port" class="form-control" type="text" placeholder="Management Port" value="{{ $threeCX->management_port }}">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <label class="offset-sm-3 col-md-2 col-sm-2 control-label" for="licence_key_type">Licence Key Type</label>
                        <div class="col-md-4 col-sm-4">
                            <input id="licence_key_type" name="licence_key_type" class="form-control" type="text" placeholder="Licence Key Type" value="{{ $threeCX->licence_key_type }}">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <label class="offset-sm-3 col-md-2 col-sm-2 control-label" for="licence_key">Licence Key</label>
                        <div class="col-md-4 col-sm-4">
                            <input id="licence_key" name="licence_key" class="form-control" type="text" placeholder="Licence Key" value="{{ $threeCX->licence_key }}">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <label class="offset-sm-3 col-md-2 col-sm-2 control-label" for="email_address">Email Address</label>
                        <div class="col-md-4 col-sm-4">
                            <input id="email_address" name="email_address" class="form-control" type="text" placeholder="Email Address" value="{{ $threeCX->email_address }}">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <label class="offset-sm-3 col-md-2 col-sm-2 control-label" for="customer_portal_username">Customer Portal Username</label>
                        <div class="col-md-4 col-sm-4">
                            <input id="customer_portal_username" name="customer_portal_username" class="form-control" type="text" placeholder="Customer Portal Username" value="{{ $threeCX->customer_portal_username }}">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <label class="offset-sm-3 col-md-2 col-sm-2 control-label" for="customer_portal_password">Customer Portal Password</label>
                        <div class="col-md-4 col-sm-4">
                            <input id="customer_portal_password" name="customer_portal_password" class="form-control" type="text" placeholder="Customer Portal Password" value="{{ $threeCX->customer_portal_password }}">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <label class="offset-sm-3 col-md-2 col-sm-2 control-label" for="root_username">Root Username</label>
                        <div class="col-md-4 col-sm-4">
                            <input id="root_username" name="root_username" class="form-control" type="text" placeholder="Root Username" value="{{ $threeCX->root_username }}">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <label class="offset-sm-3 col-md-2 col-sm-2 control-label" for="root_password">Root Password</label>
                        <div class="col-md-4 col-sm-4">
                            <input id="root_password" name="root_password" class="form-control" type="text" placeholder="Root Password" value="{{ $threeCX->root_password }}">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <label class="offset-sm-3 col-md-2 col-sm-2 control-label" for="threecx_login">3CX Login</label>
                        <div class="col-md-4 col-sm-4">
                            <input id="threecx_login" name="threecx_login" class="form-control" type="text" placeholder="3CX Login" value="{{ $threeCX->threecx_login }}">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <label class="offset-sm-3 col-md-2 col-sm-2 control-label" for="threecx_password">3CX Password</label>
                        <div class="col-md-4 col-sm-4">
                            <input id="threecx_password" name="threecx_password" class="form-control" type="text" placeholder="3CX Password" value="{{ $threeCX->threecx_password }}">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <label class="offset-sm-3 col-md-2 col-sm-2 control-label" for="sip_provider">SIP Provider</label>
                        <div class="col-md-4 col-sm-4">
                            <input id="sip_provider" name="sip_provider" class="form-control" type="text" placeholder="SIP Provider" value="{{ $threeCX->sip_provider }}">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <label class="offset-sm-3 col-md-2 col-sm-2 control-label" for="address">Address</label>
                        <div class="col-md-4 col-sm-4">
                            <input id="address" name="address" class="form-control" type="text" placeholder="Address" value="{{ $threeCX->address }}">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="offset-sm-5 col-sm-9">
                        <button type="submit" class="btn btn-primary">Update 3CX</button>
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
