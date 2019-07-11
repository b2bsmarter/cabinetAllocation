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
                    <li><a href="{{ route('cabinet.offsiteBackup') }}"> Cabinet Allocation - VPNs</a></li>
                    <li class="active">Edit VPN</li>
                </ol>
</section>

<!-- Main content -->
<section class="content paddingleft_right15">
    <div class="row">
        <div class="col-12">
        <div class="card panel-primary ">
            <div class="card-heading cardBackground">
                <h4 class="card-title float-left"> <i class="livicon" data-name="file-import" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>
                    Edit VPN
                </h4>
            </div>
            <div class="card-body">

            <form class="form-horizontal" action="{{ route('vpn.update', $vpn->id) }}" method="post">
            {{ method_field('post') }}
            {{ csrf_field() }}
                <div class="row">
                        <label class="offset-sm-3 col-md-2 col-sm-2 control-label" for="customer">Customer</label>
                        <div class="col-md-4 col-sm-4">
                            <input id="customer" name="customer" class="form-control" type="text" placeholder="Customer" value="{{ $vpn->customer }}">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <label class="offset-sm-3 col-md-2 col-sm-2 control-label" for="site">Site</label>
                        <div class="col-md-4 col-sm-4">
                            <input id="site" name="site" class="form-control" type="text" placeholder="Site" value="{{ $vpn->site }}">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <label class="offset-sm-3 col-md-2 col-sm-2 control-label" for="datacentre_firewall">Datacentre Firewall</label>
                        <div class="col-md-4 col-sm-4">
                            <input id="datacentre_firewall" name="datacentre_firewall" class="form-control" type="text" placeholder="Datacentre Firewall" value="{{ $vpn->datacentre_firewall }}">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <label class="offset-sm-3 col-md-2 col-sm-2 control-label" for="remote_site_ip">Remote Site IP</label>
                        <div class="col-md-4 col-sm-4">
                            <input id="remote_site_ip" name="remote_site_ip" class="form-control" type="text" placeholder="Remote Site IP" value="{{ $vpn->remote_site_ip }}">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <label class="offset-sm-3 col-md-2 col-sm-2 control-label" for="remote_site_router">Remote Site Router</label>
                        <div class="col-md-4 col-sm-4">
                            <input id="remote_site_router" name="remote_site_router" class="form-control" type="text" placeholder="Remote Site Router" value="{{ $vpn->remote_site_router }}">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <label class="offset-sm-3 col-md-2 col-sm-2 control-label" for="local_ip">Local(Cloud) IP/Netmask</label>
                        <div class="col-md-4 col-sm-4">
                            <input id="local_ip" name="local_ip" class="form-control" type="text" placeholder="Local(Cloud) IP/Netmask" value="{{ $vpn->local_ip }}">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <label class="offset-sm-3 col-md-2 col-sm-2 control-label" for="remote_site_ip">Remote Site IP Netmask</label>
                        <div class="col-md-4 col-sm-4">
                            <input id="remote_site_ip_netmask" name="remote_site_ip_netmask" class="form-control" type="text" placeholder="Remote Site IP Netmask" value="{{ $vpn->remote_site_ip_netmask }}">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <label class="offset-sm-3 col-md-2 col-sm-2 control-label" for="preshared_key">Preshared Key</label>
                        <div class="col-md-4 col-sm-4">
                            <input id="preshared_key" name="preshared_key" class="form-control" type="text" placeholder="Preshared Key" value="{{ $vpn->preshared_key }}">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <label class="offset-sm-3 col-md-2 col-sm-2 control-label" for="asa_group_policy">ASA Group Policy</label>
                        <div class="col-md-4 col-sm-4">
                            <input id="asa_group_policy" name="asa_group_policy" class="form-control" type="text" placeholder="ASA Group Policy" value="{{ $vpn->asa_group_policy }}">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="offset-sm-5 col-sm-9">
                        <button type="submit" class="btn btn-primary">Update VPN</button>
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
