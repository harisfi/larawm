@extends('layouts.auth')

@push('title')
    Login
@endpush

@section('content')
    <div class="card card-plain">
        <div class="card-header pb-0 text-start">
            <h4 class="font-weight-bolder">Login</h4>
            <p class="mb-0">Enter your email and password to login</p>
        </div>
        <div class="card-body">
            <form action="{{ route('login') }}" method="POST" role="form">
                @csrf
                <div class="mb-3">
                    <input type="email" name="email" class="form-control form-control-lg" placeholder="Email" aria-label="Email" value="{{ old('email') }}" required>
                </div>
                <div class="mb-3">
                    <input type="password" name="password" class="form-control form-control-lg" placeholder="Password" aria-label="Password" value="{{ old('password') }}" required>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-lg btn-primary btn-lg w-100 mt-4 mb-0">Login</button>
                </div>
            </form>
        </div>
        <div class="card-footer text-center pt-0 px-lg-2 px-1">
            <p class="mb-4 text-sm mx-auto">
                Don't have an account?
                <a href="{{ route('register') }}" class="text-primary text-gradient font-weight-bold">
                    Register
                </a>
            </p>
        </div>
    </div>
@endsection