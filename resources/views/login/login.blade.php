@extends('layouts.plantilla')

@section('main')

<!-- Normal Breadcrumb Begin -->
<section class="normal-breadcrumb set-bg" data-setbg="img/normal-breadcrumb.jpg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="normal__breadcrumb__text">
                    <h2>Login</h2>
                    <p>Welcome to the official Anime blog.</p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Normal Breadcrumb End -->

<!-- Login Section Begin -->
<section class="login spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="login__form">
                    <h3>Login</h3>
                  
                    @if(session('new_user'))
                    <div class="alert alert-success">
                        {{ session('new_user') }}
                    </div>
                    @endif
                    <form action="{{route('login')}}" method="POST">
                        @csrf
                        <div class="input__item">
                            <input type="text" name="email" class="{{ $errors->has('email') ? ' has-error' : '' }} has-feedback" placeholder="Email address">
                            <span class="icon_mail"></span>
                            @if ($errors->has('email')) <strong class="text-danger">{{ $errors->first('email') }}</strong> @endif
                        </div>
                        
                       
                        
                        <div class="input__item">
                            <input type="password" name="contraseña" class="{{ $errors->has('contraseña') ? ' has-error' : '' }} has-feedback" placeholder="Password">
                            <span class="icon_lock"></span>
                            @if ($errors->has('contraseña')) <strong class="text-danger">{{ $errors->first('contraseña') }}</strong> @endif
                        </div>
                        <button type="submit" class="site-btn">Login</button>
                    </form>
                    <a href="#" class="forget_pass">Forgot Your Password?</a>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="login__register">
                    <h3>Dont’t Have An Account?</h3>
                    <a href="{{route('registro.view')}}" class="primary-btn">Register Now</a>
                </div>
            </div>
        </div>
        <div class="login__social">
            <div class="row d-flex justify-content-center">
                <div class="col-lg-6">
                    <div class="login__social__links">
                        <span>or</span>
                        <ul>
                            <li><a href="#" class="facebook"><i class="fa fa-facebook"></i> Sign in With
                                    Facebook</a></li>
                            <li><a href="#" class="google"><i class="fa fa-google"></i> Sign in With Google</a></li>
                            <li><a href="#" class="twitter"><i class="fa fa-twitter"></i> Sign in With Twitter</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Login Section End -->


@endsection