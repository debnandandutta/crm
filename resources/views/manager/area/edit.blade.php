@extends('dashboard.master')
@inject('permission', 'App\Http\Controllers\PermissionController')
@section('title', __('lang.edit_area_manager'))

@section('main-section')
    <div class="container-fluid">
        @if($permission->manageStaff() == 1)
            <h4 class="page-title">{{ __('lang.edit_area_manager') }}
                <a href="{{ route('area-manager-list') }}" class="btn btn-primary pull-right">{{ __('lang.back') }}</a>
            </h4>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                    @include('includes.flash')
                    <!-- /.box-header -->
                        <!-- form start -->
                        <form role="form" class="" method="POST" action="{{route('update-area-manager')}}">
                            {!! csrf_field() !!}
                            <input type="hidden" name="type" value="{{ $manager->type}}">
                            <input type="hidden" name="id" value="{{ $manager->id}}">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="name">{{ __('lang.name') }}</label>
                                            <input id="name" type="text" class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ $manager->name}}" placeholder="{{ __('lang.enter_name') }}" required>

                                            @if ($errors->has('name'))
                                                <span class="invalid-feedback d-block">
                                                <strong>{{ $errors->first('name') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="email">{{ __('lang.email') }}</label>
                                            <input id="email" type="text" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{  $manager->email}}" placeholder="{{ __('lang.enter_email') }}" required>

                                            @if ($errors->has('email'))
                                                <span class="invalid-feedback d-block">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="mobile">{{ __('lang.mobile') }}</label>
                                            <input id="mobile" type="text" class="form-control {{ $errors->has('mobile') ? ' is-invalid' : '' }}" name="mobile" value="{{ $manager->mobile }}" placeholder="{{ __('lang.enter_mobile') }}" required>

                                            @if ($errors->has('mobile'))
                                                <span class="invalid-feedback d-block">
                                                <strong>{{ $errors->first('mobile') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>



                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="region">{{ __('lang.region') }}</label>
                                            <select id="region" class="form-control" name="region" required>
                                                <option value="">{{ __('lang.select_region') }}</option>
                                                @foreach ($regions as $region)
                                                    <option value="{{ $region->id }}" {{ $manager->regionId === $region->id ? 'selected' : '' }}>{{ $region->title }}</option>
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
                                        <div class="form-group">
                                            <label for="area">{{ __('lang.area') }}</label>
                                            <select id="area" class="form-control" name="area" required>
                                                <option value="">{{ __('lang.select_area') }}</option>
                                                @foreach ($areas as $area)
                                                    <option value="{{ $area->id }}" {{ $manager->areaId === $area->id ? 'selected' : '' }}>{{ $area->areaName }}</option>
                                                @endforeach
                                            </select>

                                            @if ($errors->has('area'))
                                                <span class="invalid-feedback d-block">
                                            <strong>{{ $errors->first('area') }}</strong>
                                        </span>
                                            @endif
                                        </div>
                                    </div>


                                </div>

                                <div class="box-footer mb-3">
                                    <button type="submit" class="btn btn-primary ">{{ __('lang.edit_area') }}</button>
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