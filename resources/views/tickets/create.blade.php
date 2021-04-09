@extends('layouts.master')

@section('title', __('lang.submit_a_ticket'))
@section('content')

<div class="container mt-4">
    @include('includes.flash')
    <form id="customerform" role="form" method="POST" action="{{ route('new-ticket-store.store') }}">
        {!! csrf_field() !!}
        <div class="card person-card">
            <div class="card-body">
                <div class="text-center">                
                    <i class="fa fa-question-circle-o fa-3x"></i>
                    <h2 class="card-title">{{ __('lang.whats_happening_write_us') }}</h2>
                </div>
                <div class="row">
                    <div class="form-group col-md-12 {{ $errors->has('title') ? ' has-error' : '' }}">
                        <label for="department">Title</label>
                        <input id="title" type="text" class="form-control" name="title" value="{{ old('title') }}" placeholder="{{ __('lang.enter_problem_title') }}" required>
                        @if ($errors->has('title'))
                            <span class="text-danger">
                                    {{ $errors->first('title') }}
                                </span>
                        @endif
                    </div>

                    <div class="form-group col-md-6">
                        <label for="department" class="col-form-label">{{ __('lang.department') }}</label>
                        <select id="department" type="" class="form-control {{ $errors->has('department') ? ' has-error' : '' }}" name="department">
                                <option value="">{{ __('lang.select_department') }}</option>
                                @foreach ($departments as $department)
                                    <option value="{{ $department->id }}">{{ $department->title }}</option>
                                @endforeach
                            </select>

                            @if ($errors->has('department'))
                                <span class="text-danger">
                                        {{ $errors->first('department') }}
                                    </span>
                            @endif
                    </div>

                    <div class="form-group col-md-6">
                        <label for="priority">{{ __('lang.priority') }}</label>
                        <select id="priority" type="" class="form-control {{ $errors->has('priority') ? ' has-error' : '' }}" name="priority">
                                <option value="">{{ __('lang.select_priority') }}</option>
                                <option value="low">{{ __('lang.low') }}</option>
                                <option value="medium">{{ __('lang.medium') }}</option>
                                <option value="high">{{ __('lang.high') }}</option>
                            </select>

                            @if ($errors->has('priority'))
                                <span class="text-danger">
                                        {{ $errors->first('priority') }}
                                    </span>
                            @endif
                    </div>

                    <div class="form-group col-md-12">
                        <label for="message">{{ __('lang.message') }}</label>
                            <textarea rows="6" id="message" class="form-control {{ $errors->has('message') ? ' has-error' : '' }}" name="message">{{ old('message') }}</textarea>

                            @if ($errors->has('message'))
                                <span class="text-danger">
                                        {{ $errors->first('message') }}
                                    </span>
                            @endif
                    </div>
                </div>
                <div class="mt-1">
                    <button type="submit" class="btn btn-primary btn-lg btn-block">{{ __('lang.submit_ticket') }}</button>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection

