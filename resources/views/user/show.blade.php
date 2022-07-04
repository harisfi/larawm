@extends('layouts.admin')

@push('title')
    Account Detail
@endpush

@section('content')
    <div class="card mb-4">
        <div class="card-header pb-0 d-flex justify-content-between">
            <h6>Account Detail</h6>
            <a href="{{ route('profile.edit') }}" class="btn btn-warning btn-sm px-3 mb-0 me-1">
                <i class="fa fa-pen me-1" aria-hidden="true"></i>
                Edit
            </a>
        </div>
        <div class="card-body px-0 pt-0 pb-2">
            <div class="row m-4 align-items-center">
                <div class="col-auto text-8xl text-primary text-gradient">
                    <i class="fa fa-user"></i>
                </div>
                <div class="col">
                    <div class="text-sm font-weight-bold m-4">
                        <ul class="list-group">
                            <li class="list-group-item">Name: {{ auth()->user()->name }}</li>
                            <li class="list-group-item">Email: {{ auth()->user()->email }}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('partials.modal')
@endsection