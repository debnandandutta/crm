@extends('dashboard.master')
@inject('permission', 'App\Http\Controllers\PermissionController')

@section('title',$type)

@section('main-section')

    <!-- Main content -->
    <div class="container-fluid">
        @if($permission->manageItem() == 1)

@switch($type)
       @case('call-type')
                <h4 class="page-title">{{ __('lang.call_type') }}
                  @if (Auth::user()->is_admin)
                    <a href="{{route('add-item-call-type')}}" class="btn btn-primary pull-right">{{ __('lang.add_new') }}</a>
                    @endif
                </h4>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            @include('includes.flash')
                        @include('items.call_type_table')
         @break
        @case('complain-type')
           <h4 class="page-title">{{ __('lang.complain_type') }}
            @if (Auth::user()->is_admin)
                    <a href="{{route('add-item-complain-type')}}" class="btn btn-primary pull-right">{{ __('lang.add_new') }}</a>
                      @endif
                </h4>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            @include('includes.flash')
                            @include('items.complain_type_table')
         @break
         @case('root-cause')

         <h4 class="page-title">{{ __('lang.root_cause') }}
          @if (Auth::user()->is_admin)
                    <a href="{{route('add-item-root-type')}}" class="btn btn-primary pull-right">{{ __('lang.add_new') }}</a>
                      @endif
                </h4>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            @include('includes.flash')
                            @include('items.root_cause_table')
         @break

        @case('market-channel')
           <h4 class="page-title">{{ __('lang.market_channel') }}
            @if (Auth::user()->is_admin)
                    <a href="{{route('add-item-market-channel')}}" class="btn btn-primary pull-right">{{ __('lang.add_new') }}</a>
                      @endif
                </h4>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            @include('includes.flash')
                            @include('items.market_channel_table')
                         @break

                            @default
                            <span>Something went wrong, please try again</span>
                    @endswitch
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
