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
                    <li class="active">Cabinet Allocation - Cabinets</li>
                </ol>
</section>

<!-- Main content -->
<section class="content paddingleft_right15">
    <div class="row">
        <div class="col-12">
        <div class="card panel-primary ">
            <div class="card-heading cardBackground">
                <h4 class="card-title float-left"> <i class="livicon" data-name="file-import" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>
                    Cabinets
                </h4>
                <div class="float-right">
                    <a href="{{ route('cabinet.create') }}"class="btn btn-sm btn-default"><span class='fa fa-plus'></span> New cabinet</a>
                </div>
            </div>
            <div class="card-body">
                <div>
                    <table class="table  width100" id="cabinet">
                        <thead>
                            <tr class="filters">
                                <th>Back of Cabinet(hot)</th>
                                <th>Front of Cabinet(cold)</th>
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

    var table = $('#cabinet').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{!! route('cabinet.data') !!}',
        autoWidth: false,
        columns: [
            {data: 'back_of_cabinet_hot',   name: 'back_of_cabinet_hot'},
            {data: 'front_of_cabinet_cold', name: 'front_of_cabinet_cold'},
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
