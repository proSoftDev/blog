@extends('auth.layouts.app')
@section('title', __('Вход в систему'))

@section('content')
    <section class="login-block" style="background: revert;">
        <!-- Container-fluid starts -->
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <!-- Authentication card start -->

                    <form method="POST" action="{{ route('login') }}" class="md-float-material form-material">

                        @csrf

                        <div class="auth-box card">
                            <div class="card-block">
                                <div class="m-b-20"></div>
                                <div class="form-group form-primary @error('email') has-danger @enderror">
                                    <label class="control-label">@lang('Логин') <span class="text-danger">*</span></label>
                                    <input type="text" name="email" class="form-control @error('email') form-control-danger @enderror"
                                           placeholder="@lang('Введите логин')" value="{{ old('email') }}" autocomplete="email" autofocus>
                                    @error('email')
                                        <div class="col-form-label">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group form-primary @error('password') has-danger @enderror">
                                    <label class="control-label">@lang('Пароль') <span class="text-danger">*</span></label>
                                    <input type="password" name="password" class="form-control @error('password') form-control-danger @enderror"
                                           placeholder="@lang('Введите пароль')" autocomplete="current-password">
                                    @error('password')
                                        <div class="col-form-label">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="row m-t-25 text-left">
                                    <div class="col-12">
                                        <div class="checkbox-zoom zoom-primary">
                                            <label>
                                                {{ Form::checkbox('remember') }}
                                                <span class="cr"><i class="cr-icon icofont icofont-ui-check txt-primary"></i></span>
                                                <span class="text-inverse">@lang('Запомнить меня')</span>
                                            </label>
                                        </div>
                                        @if (Route::has('register'))
                                            <div class="forgot-phone text-right f-right">
                                                <a href="{{route('register') }}" class="text-right f-w-600">
                                                    @lang('Нет аккаунта')?</a>
                                            </div>
                                        @endif
                                    </div>
                                </div>

                                <div class="row m-t-30">
                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-primary btn-md btn-block waves-effect waves-light text-center m-b-20">
                                            @lang('Войти')
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    <!-- end of form -->
                </div>
                <!-- end of col-sm-12 -->
            </div>
            <!-- end of row -->
        </div>
        <!-- end of container-fluid -->
    </section>
@endsection
