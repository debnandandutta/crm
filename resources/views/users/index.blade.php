@extends('dashboard.master')
@inject('permission', 'App\Http\Controllers\PermissionController')

@section('title', __('lang.users'))

@section('main-section')
    <!-- Main content -->
    <div class="container-fluid">
        @if($permission->manageUser() == 1)
        <h4 class="page-title">{{ __('lang.users') }}</h4>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    @include('users.table')
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