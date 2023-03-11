@extends('layouts.auth')
@section('content')
<div class="col-lg-6 d-flex justify-content-center align-items-center">
    <div class="card shadow-sm w-100 p-4 p-md-5" style="max-width: 32rem;">
        <div class="col-12 text-center mb-5">
            <h1>Sign in</h1>
            <span class="text-muted">Free access to our dashboard.</span>
        </div>
        <form method="POST" action="{{ route('login') }}" class="row g-3">
            @csrf
        <div class="col-12">
            <div class="form-floating">
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                <label>Email address</label>
            </div>
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="col-12">
            <div class="form-floating">
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                <label>password</label>
            </div>
            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="col-12">
            <div class="form-check">                
                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                <label class="form-check-label" for="remember">
                    {{ __('Remember Me') }}
                </label>
                @if (Route::has('password.request'))
                    <span class="float-end">
                        <a class="text-primary" href="{{ route('password.request') }}">{{ __('Forgot Your Password?') }}</a>
                    </span>
                @endif
            </div>
        </div>
        <div class="col-12 text-center mt-4">
            <button type="submit" class="btn btn-lg btn-block btn-dark lift text-uppercase">
                {{ __('Login') }}
            </button>
        </div>
        <div class="col-12 text-center mt-4">
            <span class="text-muted">Don't have an account yet? <a href="{{ url('register') }}">Sign up
                    here</a></span>
        </div>
        </form>


    </div>
</div>



@endsection
