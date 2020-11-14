@extends('layouts.auth_plantilla')

@section('content')

<div class="loginwrapper">
    <div class="loginwrap zindex100 animate2 bounceInDown">
    <h1 class="logintitle"><span class="iconfa-lock"></span> Sign In <span class="subtitle">Hello! Sign in to get you started!</span></h1>
        <div class="loginwrapperinner">
            <form id="loginform" method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}">
                @csrf
                <p class="animate4 bounceIn">
                    <input type="text" for="username" id="username" name="username" placeholder="RUT (sin puntos ni digito verificador)" />
                    @if ($errors->has('username'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('username') }}</strong>
                        </span>
                    @endif
                </p>
                <p class="animate5 bounceIn">
                    <input type="password" for="password" id="password" name="password" placeholder="Contraseña" />
                    @if ($errors->has('password'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </p>
                <p class="animate6 bounceIn"><button class="btn btn-default btn-block">Submit</button></p>
                <p class="animate7 fadeIn"><a href="{{ route('password.request') }}"><span class="icon-question-sign icon-white"></span> Forgot Password?</a></p>
            </form>
        </div><!--loginwrapperinner-->
    </div>
    <div class="loginshadow animate3 fadeInUp"></div>
</div><!--loginwrapper-->

@endsection
