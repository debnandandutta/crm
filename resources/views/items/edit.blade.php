@extends('dashboard.master')
@inject('permission', 'App\Http\Controllers\PermissionController')
@section('title', __('lang.edit_item'))

@section('main-section')
    <div class="container-fluid">
        @if($permission->manageItem() == 1)
            @switch($item->type)
                @case(1)
                <h4 class="page-title">{{ __('lang.call_type') }}
                    <a href="{{url('/items/call-type')}}" class="btn btn-primary pull-right">{{ __('lang.back') }}</a>
                </h4>
                @break
                @case(2)
                <h4 class="page-title">{{ __('lang.complain_type') }}
                    <a href="{{ url('/items/complain-type') }}" class="btn btn-primary pull-right">{{ __('lang.back') }}</a>
                </h4>
                @break
                @case(3)
                <h4 class="page-title">{{ __('lang.root_cause') }}
                    <a href="{{ url('/items/root-cause') }}" class="btn btn-primary pull-right">{{ __('lang.back') }}</a>
                </h4>
                @break
                @case(4)
                <h4 class="page-title">{{ __('lang.market_channel') }}
                    <a href="{{ url('/items/market-channel') }}" class="btn btn-primary pull-right">{{ __('lang.back') }}</a>
                </h4>
                @break
            @endswitch
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                    @include('includes.flash')
                    <!-- /.box-header -->
                        <!-- form start -->
                        <form role="form" class="" method="POST" action="{{ route('update-item') }}">
                            {!! csrf_field() !!}
                            <input type="hidden" name="id" value="{{$item->id}}">
                            <input type="hidden" name="type" value="{{$item->type}}">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="name">{{ __('lang.name') }}</label>
                                            <input id="name" type="text" class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ $item->name }}" placeholder="{{ __('lang.enter_name') }}" required>

                                            @if ($errors->has('name'))
                                                <span class="invalid-feedback d-block">
                                                <strong>{{ $errors->first('name') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>

                                </div>

                                <div class="box-footer mb-3">
                                    <button type="submit" class="btn btn-primary ">{{ __('lang.update') }}</button>
                                </div>
                            </div>
                            <!-- /.box-body -->
                        </form>
                    </div>
                </div>
            </div>
        @else
            <div class="callout callout-warning">
                <h4>{{ __('lang.access_denied') }}</h4>

                <p>{{ __("lang.don't have permission") }}</p>
            </div>
        @endif
    </div>
@endsection