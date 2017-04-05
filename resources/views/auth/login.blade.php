@extends('layouts.app')

@section('content')
    <main>
        <section class="fullwidth-background bg-2">
            <div class="grid-row">
                <div class="login-block">
                    <div class="logo">
                        <img src="img/logo.png" data-at2x='img/logo@2x.png' width="300" height="300" alt>
                        <h2>Vesta Camp</h2>
                    </div>

                    <div class="clear-both"></div>
                    <div class="login-or">
                        <span class="reg-span-or">:ورود </span>
                    </div>

                    <br>
                    <a class="btn btn-primary" href="{{route('github.login')}}" >
                    <span class="fa-stack fa-2x git-btn">
                        <i class="fa fa-github fa-stack-2x"></i>
                    </span></a>
                    <a class="btn btn-primary" href="{{route('google.login')}}" >
                    <span class="fa-stack fa-2x g-btn">
                        <i class="fa fa-circle fa-stack-2x" style="color: #f27c66"></i>
                        <i class="fa fa-google-plus fa-stack-1x fa-inverse"></i>
                    </span>
                    </a>
                    <div class="clear-both"></div>
                    <div class="login-or">
                        <hr class="hr-or">
                        <span class="span-or">یا</span>
                    </div>
                    <form class="login-form" role="form" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif
                        @if (session('warning'))
                            <div class="alert alert-warning">
                                {{ session('warning') }}
                            </div>
                        @endif
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="ایمیل" required autofocus>
                                <span class="input-icon">
								    <i class="fa fa-user"></i>
							    </span>
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                        </div>
                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <input id="password" type="password" class="form-control" name="password" placeholder="گذرواژه" required>
                                <span class="input-icon">
								    <i class="fa fa-lock"></i>
							    </span>
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                        </div>
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }} > مرا به خاطر بسپار
                            </label>
                        </div>

                        <p class="small">
                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                گذرواژه را فراموش کردید؟
                            </a>
                        </p>
                        <button type="submit" class="button-fullwidth cws-button bt-color-3 border-radius alt">ورود</button>
                    </form>
                </div>
            </div>
        </section>
    </main>

@endsection
