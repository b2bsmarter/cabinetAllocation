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
                    <li><a href="{{ route('cabinet.cabinet') }}"> Cabinet Allocation - Cabinets</a></li>
                    <li class="active">Create Cabinet</li>
                </ol>
</section>

<!-- Main content -->
<section class="content paddingleft_right15">
    <div class="row">
        <div class="col-12">
        <div class="card panel-primary ">
            <div class="card-heading cardBackground">
                <h4 class="card-title float-left"> <i class="livicon" data-name="file-import" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>
                    Create Cabinet
                </h4>
            </div>
            <div class="card-body">

            <form class="form-horizontal" action="{{ route('cabinet.store') }}" method="post">
            {{ method_field('post') }}
            {{ csrf_field() }}
                <div class="form-group">
                    <div class="row">
                        <label class="offset-sm-3 col-md-2 col-sm-2 control-label" for="back_of_cabinet_hot">Back of Cabinet(hot)</label>
                        <div class="col-md-4 col-sm-4">
                            <input id="back_of_cabinet_hot" name="back_of_cabinet_hot" class="form-control" type="text" placeholder="Back of Cabinet(hot)">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <label class="offset-sm-3 col-md-2 col-sm-2 control-label" for="front_of_cabinet_cold">Front of Cabinet(cold)</label>
                        <div class="col-md-4 col-sm-4">
                            <input id="front_of_cabinet_cold" name="front_of_cabinet_cold" class="form-control" type="text" placeholder="Front of Cabinet(cold)">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="offset-sm-5 col-sm-9">
                        <button type="submit" class="btn btn-primary">Create Cabinet</button>
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
