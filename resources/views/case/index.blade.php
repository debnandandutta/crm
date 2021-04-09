@extends('dashboard.master')
@inject('permission', 'App\Http\Controllers\PermissionController')

@section('title', 'Case')

@section('main-section')
    <!-- Main content -->
    <div class="container-fluid">
        @if($permission->manageTicket() == 1 || Auth::user()->user_type == 1)
            @if($preference==0)
            <h4 class="page-title">{{ __('lang.case') }}
            @else
                <h4 class="page-title">{{ __('lang.tickets') }}
           @endif

            <a href="{{ route('add_new_case') }}" target="_blank" class="btn btn-primary btn-md pull-right">{{ __('lang.add_new') }}</a>
        </h4>
        <div class="row">
            <div class="col-md-12">
                <div class="card" id="ticketType" data-type="all" data-preference="{{$preference}}">
                    <!-- /.box-header -->
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