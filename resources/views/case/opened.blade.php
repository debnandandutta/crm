@extends('dashboard.master')
@inject('permission', 'App\Http\Controllers\PermissionController')

@section('title', __('lang.open_tickets'))

@section('main-section')
    <!-- Main content -->
    <div class="container-fluid">
        @if($permission->manageTicket() == 1 || Auth::user()->user_type == 1)
        <h4 class="page-title">
            @if($preference==1)
                {{ __("lang.open_tickets") }}
            @else
                {{ __("lang.open_cases") }}
            @endif
            <span class="pull-right">
                <a href="{{ route('add_new_case') }}" target="_blank" class="btn btn-primary btn-md pull-right">{{ __('lang.add_new') }}</a>
            </span>
        </h4>
        <div class="row">
            <div class="col-md-12">

                <div class="card" id="ticketType" data-type="open" data-preference="{{$preference}}">
                    @include('case.table', ['departments' => $departments])
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
        @else
            <div class="callout callout-warning">
                <h4>{{ __('lang.access_denied') }}</h4>

                <p>{{ __("lang.don't have permission") }}</p>
            </div>
        @endif
    </div>
    <!-- /.content -->

@endsection