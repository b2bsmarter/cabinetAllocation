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
                    <li><a href="{{ route('cabinet.offsiteBackup') }}"> Cabinet Allocation - Accounts</a></li>
                    <li class="active">Edit Account</li>
                </ol>
</section>

<!-- Main content -->
<section class="content paddingleft_right15">
    <div class="row">
        <div class="col-12">
        <div class="card panel-primary ">
            <div class="card-heading cardBackground">
                <h4 class="card-title float-left"> <i class="livicon" data-name="file-import" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>
                    Edit Account
                </h4>
            </div>
            <div class="card-body">

            <form class="form-horizontal" action="{{ route('adminAccount.update', $adminAccount->id) }}" method="post">
            {{ method_field('post') }}
            {{ csrf_field() }}
                <div class="form-group">
                    <div class="row">
                        <label class="offset-sm-3 col-md-2 col-sm-2 control-label" for="account_name">Account Name</label>
                        <div class="col-md-4 col-sm-4">
                            <input id="account_name" name="account_name" class="form-control" type="text" placeholder="Account Name" value="{{ $adminAccount->account_name }}">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <label class="offset-sm-3 col-md-2 col-sm-2 control-label" for="username">Username</label>
                        <div class="col-md-4 col-sm-4">
                            <input id="username" name="username" class="form-control" type="text" placeholder="Username" value="{{ $adminAccount->username }}">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <label class="offset-sm-3 col-md-2 col-sm-2 control-label" for="password">Password</label>
                        <div class="col-md-4 col-sm-4">
                            <input id="password" name="password" class="form-control" type="text" placeholder="Password" value="{{ $adminAccount->password }}">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <label class="offset-sm-3 col-md-2 col-sm-2 control-label" for="description">Description</label>
                        <div class="col-md-4 col-sm-4">
                            <input id="description" name="description" class="form-control" type="text" placeholder="Deccription" value="{{ $adminAccount->description }}">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="offset-sm-5 col-sm-9">
                        <button type="submit" class="btn btn-primary">Update Account</button>
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
