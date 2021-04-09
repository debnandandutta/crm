@extends('dashboard.master')
@inject('permission', 'App\Http\Controllers\PermissionController')
@section('title', __('lang.add_new_town'))

@section('main-section')
    <div class="container-fluid">
        @if($permission->manageStaff() == 1)
            <h4 class="page-title">{{ __('lang.add_new_town') }}
                <a href="{{ route('townList') }}" class="btn btn-primary pull-right">{{ __('lang.back') }}</a>
            </h4>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                    @include('includes.flash')
                    <!-- /.box-header -->
                        <!-- form start -->
                        <form role="form" class="" method="POST" action="{{ route('save-town') }}">
                            {!! csrf_field() !!}
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="name">{{ __('lang.name') }}</label>
                                            <input id="name" type="text" class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" placeholder="{{ __('lang.enter_name') }}" required>

                                            @if ($errors->has('name'))
                                                <span class="invalid-feedback d-block">
                                                <strong>{{ $errors->first('name') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="region">{{ __('lang.region') }}</label>
                                            <select id="region" class="form-control" name="region" required>
                                                <option value="">{{ __('lang.select_region') }}</option>
                                                @foreach ($regions as $region)
                                                    <option value="{{ $region->id }}" {{ old('region') === $region->id ? 'selected' : '' }}>{{ $region->title }}</option>
                                                @endforeach
                                            </select>

                                            @if ($errors->has('region'))
                                                <span class="invalid-feedback d-block">
                                            <strong>{{ $errors->first('region') }}</strong>
                                        </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="area">{{ __('lang.area') }}</label>
                                            <select id="area" class="form-control" name="area" required>
                                                <option value="">{{ __('lang.select_area') }}</option>

                                            </select>

                                            @if ($errors->has('area'))
                                                <span class="invalid-feedback d-block">
                                            <strong>{{ $errors->first('area') }}</strong>
                                        </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="territory">{{ __('lang.territory') }}</label>
                                            <select id="territory" class="form-control" name="territory" required>
                                                <option value="">{{ __('lang.select_territory') }}</option>

                                            </select>

                                            @if ($errors->has('territory'))
                                                <span class="invalid-feedback d-block">
                                            <strong>{{ $errors->first('territory') }}</strong>
                                        </span>
                                            @endif
                                        </div>
                                    </div>

                                </div>

                                <div class="box-footer mb-3">
                                    <button type="submit" class="btn btn-primary ">{{ __('lang.add_new_town') }}</button>
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