@extends('layouts.admin')

@push('title')
    Edit Profile
@endpush

@section('content')
    <div class="row">
        <div class="col-md-8">
            <div class="card mb-4">
                <div class="card-header pb-0 d-flex justify-content-between">
                    <h6>Edit Profile</h6>
                    <a href="{{ route('profile.show') }}" class="btn btn-warning btn-sm px-3 mb-0 me-1">
                        <i class="fa fa-arrow-left me-1" aria-hidden="true"></i>
                        Back
                    </a>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <form action="{{ route('profile.update') }}" method="POST" class="row m-3">
                        @method('PUT')
                        @csrf
                        <div class="col-12 form-group required">
                            <label for="name" class="form-control-label">Name</label>
                            <input name="name" id="name" class="form-control" type="text" placeholder="John Doe" value="{{ old('name', auth()->user()->name) }}" required>
                            @error('name')
                                <p class="text-sm text-danger ms-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-12 form-group required">
                            <label for="email" class="form-control-label">Email</label>
                            <input name="email" id="email" class="form-control" type="email" placeholder="example@mail.com" value="{{ old('email', auth()->user()->email) }}" required>
                            @error('email')
                                <p class="text-sm text-danger ms-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <hr class="horizontal dark">
                        <div class="col-12 form-group">
                            <label for="password" class="form-control-label">Password</label>
                            <input name="password" id="password" class="form-control" type="password" placeholder="Password">
                            @error('password')
                                <p class="text-sm text-danger ms-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-12 form-group">
                            <label for="password_confirmation" class="form-control-label">Password Confirmation</label>
                            <input name="password_confirmation" id="password_confirmation" class="form-control" type="password" placeholder="Password Confirmation">
                            @error('password_confirmation')
                                <p class="text-sm text-danger ms-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn btn-success btn-sm px-3 mb-0 me-1">
                                <i class="fa fa-check me-1" aria-hidden="true"></i>
                                Save
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card card-profile">
                <img src="{{ asset('/img/office.jpg') }}" alt="Image placeholder" class="card-img">
            </div>
        </div>
    </div>
@endsection