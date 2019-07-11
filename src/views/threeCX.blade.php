@extends('layouts/default')

{{-- Page title --}}
@section('title')
Cabinet Allocation
@parent
@stop

{{-- page level styles --}}
@section('header_styles')
<link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/datatables/css/dataTables.bootstrap4.css') }}" />
<link href="{{ asset('assets/css/pages/tables.css') }}" rel="stylesheet" type="text/css" />
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
                    <li class="active">Cabinet Allocation - 3CXs</li>
                </ol>
</section>

<!-- Main content -->
<section class="content paddingleft_right15">
    <div class="row">
        <div class="col-12">
        <div class="card panel-primary ">
            <div class="card-heading cardBackground">
                <h4 class="card-title float-left"> <i class="livicon" data-name="file-import" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>
                    3CX
                </h4>
                <div class="float-right">
                    <a href="{{ route('threeCX.create') }}"class="btn btn-sm btn-default"><span class='fa fa-plus'></span> New 3CX</a>
                </div>
            </div>
            <div class="card-body">
                <div>
                    <table class="table  width100" id="threeCX">
                        <thead>
                            <tr class="filters">
                                <th>Customer</th>
                                <th>Server Name</th>
                                <th>IP Address</th>
                                <th>HDD</th>
                                <th>Call Recording</th>
                                <th>FQDN</th>
                                <th>Management Port</th>
                                <th>Licence Key Type</th>
                                <th>Licence Key</th>
                                <th>Email Address</th>
                                <th>Customer Portal Username</th>
                                <th>Customer Portal Password</th>
                                <th>Root Username</th>
                                <th>Root Password</th>
                                <th>3CX Login</th>
                                <th>3CX Password</th>
                                <th>SIP Provider</th>
                                <th>Address</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>


                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    </div><!-- row-->
</section>


@stop

{{-- page level scripts --}}
@section('footer_scripts')
<script type="text/javascript" src="{{ asset('assets/vendors/datatables/js/jquery.dataTables.js') }}" ></script>
<script type="text/javascript" src="{{ asset('assets/vendors/datatables/js/dataTables.bootstrap4.js') }}" ></script>
<script>

    var table = $('#threeCX').DataTable({
        processing: true,
        serverSide: true,
        scrollX: true,
        ajax: '{!! route('threeCX.data') !!}',
        autoWidth: true,
        columns: [
            {data: 'customer',                  name: 'customer'},
            {data: 'server_name',               name: 'server_name'},
            {data: 'ip_address',                name: 'ip_address'},
            {data: 'hdd',                       name: 'hdd'},
            {data: 'call_recording',            name: 'call_recording'},
            {data: 'fqdn',                      name: 'fqdn'},
            {data: 'management_port',           name: 'management_port'},
            {data: 'licence_key_type',          name: 'licence_key_type'},
            {data: 'licence_key',               name: 'licence_key'},
            {data: 'email_address',             name: 'email_address'},
            {data: 'customer_portal_username',  name: 'customer_portal_username'},
            {data: 'customer_portal_password',  name: 'customer_portal_password'},
            {data: 'root_username',             name: 'root_username'},
            {data: 'root_password',             name: 'root_password'},
            {data: 'threecx_login',             name: 'threecx_login'},
            {data: 'threecx_password',          name: 'threecx_password'},
            {data: 'sip_provider',              name: 'sip_provider'},
            {data: 'address',                   name: 'address'},
            {data: 'actions',                   name: 'actions'},

        ],
        "language": {
                "lengthMenu": '_MENU_ ',
                "search": '',
                "searchPlaceholder": "{{ __('form.search') }}"
                // "paginate": {
                //     "previous": '<i class="fa fa-angle-left"></i>',
                //     "next": '<i class="fa fa-angle-right"></i>'
                // }
        }
    });
    table.on( 'draw', function () {
                    $('.livicon').each(function(){
                        $(this).updateLivicon();
                    });
                });


</script>
@stop
