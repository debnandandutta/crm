@extends('vendor.installer.layouts.master')

@section('template_title')
    Step 3 | Admin Login Info
@endsection

@section('title')
    <i class="fa fa-sign-in fa-fw" aria-hidden="true"></i>
    Admin Login Info
@endsection

@section('container')
    @if(session()->has('db_errors'))
    <div class="alert alert-danger">
        <i class="fa fa-fw fa-exclamation-triangle" aria-hidden="true"></i> {{ session('db_errors') }}
    </div>
    @endif
    @if(session()->has('form_errors'))
    <div class="alert alert-danger">
        <i class="fa fa-fw fa-exclamation-triangle" aria-hidden="true"></i> {{ session('form_errors') }}
    </div>
    @endif
    <div class="tabs-full">

        <form method="post" action="{{ route('LaravelInstaller::userSaveWizard') }}" class="tabs-wrap" method="post">
            @csrf
            <div class="tab" id="tab1content">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="form-group {{ $errors->has('name') ? ' has-error ' : '' }}">
                    <label for="name">
                        {{ trans('Name') }}
                    </label>
                    <input type="text" name="name" id="name" value="{{ old('name') }}" placeholder="type your name" />
                    @if ($errors->has('name'))
                        <span class="error-block">
                            <i class="fa fa-fw fa-exclamation-triangle" aria-hidden="true"></i>
                            {{ $errors->first('name') }}
                        </span>
                    @endif
                </div>

                <div class="form-group {{ $errors->has('email') ? ' has-error ' : '' }}">
                    <label for="email">
                        {{ trans('Email') }}
                    </label>
                    <input type="email" name="email" id="email" value="{{ old('email') }}" placeholder="{{ trans('email') }}" />
                    @if ($errors->has('email'))
                        <span class="error-block">
                            <i class="fa fa-fw fa-exclamation-triangle" aria-hidden="true"></i>
                            {{ $errors->first('email') }}
                        </span>
                    @endif
                </div>

                <div class="form-group {{ $errors->has('password') ? ' has-error ' : '' }}">
                    <label for="password">
                        {{ trans('Password') }}
                    </label>
                    <input type="password" name="password" id="password" value="" placeholder="{{ trans('password') }}" />
                    @if ($errors->has('password'))
                        <span class="error-block">
                            <i class="fa fa-fw fa-exclamation-triangle" aria-hidden="true"></i>
                            {{ $errors->first('password') }}
                        </span>
                    @endif
                </div>


                <div class="buttons">
                    <button class="button" type="submit">
                        {{ trans('installer_messages.environment.wizard.form.buttons.setup_database') }}
                        <i class="fa fa-angle-right fa-fw" aria-hidden="true"></i>
                    </button>
                </div>
            </div>
        </form>

    </div>
@endsection

@section('scripts')
    <script type="text/javascript">
        function checkEnvironment(val) {
            var element=document.getElementById('environment_text_input');
            if(val=='other') {
                element.style.display='block';
            } else {
                element.style.display='none';
            }
        }
        function showDatabaseSettings() {
            document.getElementById('tab2').checked = true;
        }
        function showApplicationSettings() {
            document.getElementById('tab3').checked = true;
        }
    </script>
@endsection
