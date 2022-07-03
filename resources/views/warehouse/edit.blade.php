@extends('layouts.admin')

@push('title')
    Edit Warehouse
@endpush

@section('content')
    <div class="row">
        <div class="col-md-8">
            <div class="card mb-4">
                <div class="card-header pb-0 d-flex justify-content-between">
                    <h6>Edit Warehouse</h6>
                    <a href="{{ route('warehouse.index') }}" class="btn btn-warning btn-sm px-3 mb-0 me-1">
                        <i class="fa fa-arrow-left me-1" aria-hidden="true"></i>
                        Back
                    </a>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <form action="{{ route('warehouse.update', $warehouse) }}" method="POST" class="m-3">
                        @method('PUT')
                        @csrf
                        <div class="form-group required">
                            <label for="name" class="form-control-label">Name</label>
                            <input name="name" id="name" class="form-control" type="text" placeholder="PT Company" value="{{ old('name', $warehouse->name) }}" required>
                            @error('name')
                                <p class="text-sm text-danger ms-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group required">
                            <label for="branch" class="form-control-label">Branch</label>
                            <input name="branch" id="branch" class="form-control" type="text" placeholder="New York" value="{{ old('branch', $warehouse->branch) }}" required>
                            @error('branch')
                                <p class="text-sm text-danger ms-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-success btn-sm px-3 mb-0 me-1">
                            <i class="fa fa-check me-1" aria-hidden="true"></i>
                            Save
                        </button>
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