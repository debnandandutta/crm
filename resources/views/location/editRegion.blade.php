@extends('dashboard.master')
@inject('permission', 'App\Http\Controllers\PermissionController')
@section('title', __('lang.add_new_staff'))

@section('main-section')
    <div class="container-fluid">
        @if($permission->manageStaff() == 1)
            <h4 class="page-title">{{ __('lang.edit_region') }}
                <a href="{{ route('regions') }}" class="btn btn-primary pull-right">{{ __('lang.back') }}</a>
            </h4>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                    @include('includes.flash')
                    <!-- /.box-header -->
                        <!-- form start -->
                        <form role="form" class="" method="POST" action="{{ route('update-region') }}">
                            {!! csrf_field() !!}
                            <input type="hidden" name="id" value="{{$region->id}}">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="name">{{ __('lang.name') }}</label>
                                            <input id="name" type="text" class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ $region->title }}" placeholder="{{ __('lang.enter_name') }}" required>

                                            @if ($errors->has('name'))
                                                <span class="invalid-feedback d-block">
                                                <strong>{{ $errors->first('name') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>

                                </div>

                                <div class="box-footer mb-3">
                                    <button type="submit" class="btn btn-primary ">{{ __('lang.edit_region') }}</button>
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