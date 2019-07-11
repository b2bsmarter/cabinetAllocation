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
                    <li><a href="{{ route('cabinet.offsiteBackup') }}"> Cabinet Allocation - Offsite Backups</a></li>
                    <li class="active">Create Backup</li>
                </ol>
</section>

<!-- Main content -->
<section class="content paddingleft_right15">
    <div class="row">
        <div class="col-12">
        <div class="card panel-primary ">
            <div class="card-heading cardBackground">
                <h4 class="card-title float-left"> <i class="livicon" data-name="file-import" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>
                    Create Offsite Backup
                </h4>
            </div>
            <div class="card-body">

            <form class="form-horizontal" action="{{ route('offsiteBackup.store') }}" method="post">
            {{ method_field('post') }}
            {{ csrf_field() }}
                <div class="form-group">
                    <div class="row">
                        <label class="offset-sm-3 col-md-2 col-sm-2 control-label" for="type">Type</label>
                        <div class="col-md-4 col-sm-4">
                            <input id="type" name="type" class="form-control" type="text" placeholder="Type">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <label class="offset-sm-3 col-md-2 col-sm-2 control-label" for="customer">Customer</label>
                        <div class="col-md-4 col-sm-4">
                            <input id="customer" name="customer" class="form-control" type="text" placeholder="Customer">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <label class="offset-sm-3 col-md-2 col-sm-2 control-label" for="username">Username</label>
                        <div class="col-md-4 col-sm-4">
                            <input id="username" name="username" class="form-control" type="text" placeholder="Username">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <label class="offset-sm-3 col-md-2 col-sm-2 control-label" for="ashay_backup_type">ASHAY Backup Type</label>
                        <div class="col-md-4 col-sm-4">
                            <input id="ashay_backup_type" name="ashay_backup_type" class="form-control" type="text" placeholder="ASHAY Backup Type">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <label class="offset-sm-3 col-md-2 col-sm-2 control-label" for="password">Password</label>
                        <div class="col-md-4 col-sm-4">
                            <input id="password" name="password" class="form-control" type="text" placeholder="Password">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <label class="offset-sm-3 col-md-2 col-sm-2 control-label" for="master_key_encryption">Master Key Encryption</label>
                        <div class="col-md-4 col-sm-4">
                            <input id="master_key_encryption" name="master_key_encryption" class="form-control" type="text" placeholder="Master Key Encryption">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="offset-sm-5 col-sm-9">
                        <button type="submit" class="btn btn-primary">Create Backup</button>
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
