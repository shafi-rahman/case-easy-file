@extends('layouts.auth')
@section('content')
<div class="col-lg-6 d-flex justify-content-center align-items-center">
    <div class="card shadow-sm w-100 p-4 p-md-5" style="max-width: 32rem;">
        <div class="col-12 text-center mb-5">
            <h1>Create account</h1>
            <span class="text-muted">Free access to our dashboard.</span>
        </div>
        <form method="post" action="{{ route('register') }}" class="row g-3">
            @csrf
        <div class="col-md-12 col-12">
            <div class="form-floating">
                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                <label>{{ __('Name') }}</label>
            </div>
            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="col-12">
            <div class="form-floating">
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                <label>{{ __('Email Address') }}</label>
            </div>
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="col-12">
            <div class="form-floating">
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                <label>{{ __('Password') }}</label>
            </div>
            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="col-12">
            <div class="form-floating">
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                <label>{{ __('Confirm Password') }}</label>
            </div>
        </div>



        <div class="col-12 text-center mt-4">
            <button type="submit" class="btn btn-lg btn-block btn-dark lift text-uppercase">{{ __('Register') }}</button>
        </div>
        <div class="col-12 text-center mt-4">
            <span class="text-muted">Already have an account? <a href="{{ url('login') }}">Sign in here</a></span>
        </div>
    </form>
    </div>
</div>
@endsection