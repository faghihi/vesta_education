@extends('layouts.app')

@section('content')
    <main>
        <section class="fullwidth-background bg-2">
            <div class="grid-row">
                <div class="login-block">
                    <div class="logo">
                        <img src="img/logo.png" width="100" height="100" alt>
                        <h2>Vesta Camp</h2>
                    </div>
                    <form class="login-form" role="form" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}
                        @if($key)
                            <p>
                                اگر از طرف دوستتون دعوت شدید از لاگین با شبکه های اجتماعی استفاده نکنید.
                            </p>
                        @endif
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <input id="name" type="text" class="login-input" placeholder="نام و نام خانوادگی" name="name" value="{{ old('name') }}" required autofocus>
                                <span class="input-icon">
                                    <i class="fa fa-user"></i>
                                </span>
                                @if ($errors->has('name'))
                                    <div class="info-boxes error-message">
                                        <div class="info-box-icon"><i class="fa fa-times"></i></div>
                                        <span>{{ $errors->first('name') }}</span>
                                        <div class="close-button"></div>
                                    </div>
                                @endif
                        </div>
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <input id="email" type="email" class="login-input" placeholder="ایمیل" name="email" value="{{ old('email') }}" required>
                                <span class="input-icon">
								    <i class="fa fa-envelope-o"></i>
							    </span>
                                @if ($errors->has('email'))
                                    <div class="info-boxes error-message">
                                        <div class="info-box-icon"><i class="fa fa-times"></i></div>
                                        <span>{{ $errors->first('email') }}</span>
                                        <div class="close-button"></div>
                                    </div>
                                @endif
                        </div>
                        <div class="form-group{{ $errors->has('mobile') ? ' has-error' : '' }}">
                                <input id="mobile" type="text" class="login-input" placeholder="تلفن همراه" name="mobile" value="{{ old('mobile') }}" required>
                                <span class="input-icon">
								    <i class="fa fa-phone"></i>
							    </span>
                                @if ($errors->has('mobile'))
                                    <div class="info-boxes error-message">
                                        <div class="info-box-icon"><i class="fa fa-times"></i></div>
                                        <span>{{ $errors->first('mobile') }}</span>
                                        <div class="close-button"></div>
                                    </div>
                                @endif
                        </div>
                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <input id="password" class="login-input" placeholder="گذرواژه" type="password" class="form-control" name="password" required>
                                <span class="input-icon">
								    <i class="fa fa-lock"></i>
							    </span>
                                @if ($errors->has('password'))
                                    <div class="info-boxes error-message">
                                        <div class="info-box-icon"><i class="fa fa-times"></i></div>
                                        <span>{{ $errors->first('password') }}</span>
                                        <div class="close-button"></div>
                                    </div>
                                @endif

                        </div>
                        <div class="form-group">
                            <input id="password-confirm" type="password" class="login-input" placeholder="تایید گذرواژه" name="password_confirmation" required>
                            <span class="input-icon">
								<i class="fa fa-lock"></i>
							</span>
                        </div>
                        <br><br>

                        <div class="clear-both"></div>
                        <div class="login-or">
                            <hr class="hr-or">
                            <span class="reg-span-or">:یا ورود با </span>
                        </div>
                        <div class="centering">
                            <a href="{{route('github.login')}}" class="">
								<span class="fa-stack fa-2x git-btn">
									<i class="fa fa-github fa-stack-2x"></i>
								</span>
                            </a>
                            <a href="{{route('google.login')}}" class="">
								<span class="fa-stack fa-2x g-btn">
									<i class="fa fa-circle fa-stack-2x" style="color: #f27c66"></i>
									<i class="fa fa-google-plus fa-stack-1x fa-inverse"></i>
								</span>
                            </a>
                        </div>
                        <br>
                        @if($key)
                            <input type="hidden" name="key" value="{{$key}}">
                        @endif
                        <button type="submit" class="button-fullwidth cws-button bt-color-3 border-radius">ایجاد یک حساب</button>
                    </form>
                </div>
            </div>
        </section>
    </main>
@endsection
