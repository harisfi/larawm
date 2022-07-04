@extends('layouts.auth')

@push('title')
    Register
@endpush

@section('content')
    <div class="card card-plain">
        <div class="card-header pb-0 text-start">
            <h4 class="font-weight-bolder">Register</h4>
            <p class="mb-0">Fill this form register</p>
        </div>
        <div class="card-body">
            <form action="{{ route('register') }}" method="POST" role="form">
                @csrf
                <div class="mb-3">
                    <input type="text" name="name" class="form-control form-control-lg" placeholder="Name" aria-label="Name" value="{{ old('name') }}" required>
                    @error('name')
                        <p class="text-sm text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-3">
                    <input type="email" name="email" class="form-control form-control-lg" placeholder="Email" aria-label="Email" value="{{ old('email') }}" required>
                    @error('email')
                        <p class="text-sm text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-3">
                    <input type="password" name="password" class="form-control form-control-lg" placeholder="Password" aria-label="Password" value="{{ old('password') }}" required>
                    @error('password')
                        <p class="text-sm text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-3">
                    <input type="password" name="password_confirmation" class="form-control form-control-lg" placeholder="Password Confirmation" aria-label="Password Confirmation" required>
                    @error('password_confirmation')
                        <p class="text-sm text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-lg btn-primary btn-lg w-100 mt-4 mb-0">Register</button>
                </div>
            </form>
        </div>
        <div class="card-footer text-center pt-0 px-lg-2 px-1">
            <p class="mb-4 text-sm mx-auto">
                Already have an account?
                <a href="{{ route('login') }}" class="text-primary text-gradient font-weight-bold">
                    Login
                </a>
            </p>
        </div>
    </div>
@endsection