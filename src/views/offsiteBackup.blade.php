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
                    <li class="active">Cabinet Allocation - Offsite Backups</li>
                </ol>
</section>

<!-- Main content -->
<section class="content paddingleft_right15">
    <div class="row">
        <div class="col-12">
        <div class="card panel-primary ">
            <div class="card-heading cardBackground">
                <h4 class="card-title float-left"> <i class="livicon" data-name="file-import" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>
                    Offsite Backups
                </h4>
                <div class="float-right">
                    <a href="{{ route('offsiteBackup.create') }}"class="btn btn-sm btn-default"><span class='fa fa-plus'></span> New Backup</a>
                </div>
            </div>
            <div class="card-body">
                <div>
                    <table class="table  width100" id="offsiteBackups">
                        <thead>
                            <tr class="filters">
                                <th>Type</th>
                                <th>Customer</th>
                                <th>Username</th>
                                <th>ASHAY Backup Type</th>
                                <th>Password</th>
                                <th>Master Key Encryption</th>
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

    var table = $('#offsiteBackups').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{!! route('offsiteBackup.data') !!}',
        autoWidth: false,
        columns: [
            {data: 'type',                  name: 'type'},
            {data: 'customer',              name: 'customer'},
            {data: 'username',              name: 'username'},
            {data: 'ashay_backup_type',     name: 'ashay_backup_type'},
            {data: 'password',              name: 'password'},
            {data: 'master_key_encryption', name: 'master_key_encryption'},
            {data: 'actions',               name: 'actions'},

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
