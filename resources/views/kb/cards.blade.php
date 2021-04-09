@extends('dashboard.master')
@inject('permission', 'App\Http\Controllers\PermissionController')

@section('title', 'Knowledge Base')
@section('style')
    <link rel="stylesheet" type="text/css" media="screen" href="{{ asset($publicPath.'/css/custom.css') }}">
@endsection
@section('main-section')

    <!-- Main content -->
    <div class="container-fluid">
        @if($permission->manageKB() == 1)
            <h4 class="page-title">{{ __('lang.knowledge_base') }}
            @if (Auth::user()->is_admin)
                <a href="{{ route('knowledge-base-create.create') }}" class="btn btn-primary btn-md pull-right">{{ __('lang.add_new') }}</a>
                @endif
            </h4>

                    <div class="row">
                        <div class="col-md-12">

                                @widget('categoryCard')
                            <!-- /.box-body -->

                            <!-- /.box -->
                        </div>
                        <!-- /.col -->
                    </div>

        @else
            <div class="callout callout-warning">
                <h4>{{ __('lang.access_denied') }}</h4>

                <p>{{ __("lang.don't_have_permission") }}</p>
            </div>
    @endif
    <!-- /.row -->
    </div>
    <!-- /.content -->

@endsection