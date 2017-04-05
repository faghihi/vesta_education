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

                    <form class="login-form" role="form" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

                        <label style="direction: rtl"> شماره تلفن خودرا وارد کنید:</label>

                        <div class="form-group">
                            <input type="tel" class="login-input" placeholder="موبایل">
							<span class="input-icon">
								<i class="fa fa-phone"></i>
							</span>
                        </div>

                        <button type="submit" class="button-fullwidth cws-button bt-color-3 border-radius">ثبت</button>


                    </form>
                </div>
            </div>
        </section>
    </main>
@endsection