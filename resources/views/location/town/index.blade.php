@extends('dashboard.master')
@inject('permission', 'App\Http\Controllers\PermissionController')

@section('title', __('lang.town'))

@section('main-section')

    <!-- Main content -->
    <div class="container-fluid">
        @if($permission->manageItem() == 1)
            <h4 class="page-title">{{ __('lang.town') }}
              @if (Auth::user()->is_admin)
                <a href="{{route('add-town')}}" class="btn btn-primary pull-right">{{ __('lang.add_new') }}</a>
                @endif
            </h4>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                    @include('includes.flash')

                    @include('location.town.table')
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

                <p>{{ __("lang.don't_have_permission") }}</p>
            </div>
        @endif
    </div>
    <!-- /.content -->

@endsection
