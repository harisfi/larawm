@extends('layouts.admin')

@push('title')
    Add Product
@endpush

@section('content')
    <div class="row">
        <div class="col-md-8">
            <div class="card mb-4">
                <div class="card-header pb-0 d-flex justify-content-between">
                    <h6>Add Product</h6>
                    <a href="{{ route('product.index') }}" class="btn btn-warning btn-sm px-3 mb-0 me-1">
                        <i class="fa fa-arrow-left me-1" aria-hidden="true"></i>
                        Back
                    </a>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data" class="row m-3">
                        @csrf
                        <div class="col-12 form-group required">
                            <label for="code" class="form-control-label">Code</label>
                            <input name="code" id="code" class="form-control" type="text" placeholder="123456" value="{{ old('code') }}" required>
                            @error('code')
                                <p class="text-sm text-danger ms-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-12 form-group required">
                            <label for="name" class="form-control-label">Name</label>
                            <input name="name" id="name" class="form-control" type="text" placeholder="Product 1" value="{{ old('name') }}" required>
                            @error('name')
                                <p class="text-sm text-danger ms-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-md-6 form-group required">
                            <label for="stock" class="form-control-label">Stock</label>
                            <input name="stock" id="stock" type="number" class="form-control" placeholder="5" value="{{ old('stock') }}" required>
                            @error('stock')
                                <p class="text-sm text-danger ms-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-md-6 form-group required">
                            <label for="warehouse_id" class="form-control-label">Warehouse</label>
                            <select name="warehouse_id" id="warehouse_id" class="form-control form-select">
                                <option selected disabled>- Select Warehouse -</option>
                                @foreach ($warehouses as $warehouse)
                                    <option value="{{ $warehouse->id }}">{{ $warehouse->name }}</option>
                                @endforeach
                            </select>
                            @error('warehouse_id')
                                <p class="text-sm text-danger ms-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-12 form-group">
                            <label for="image" class="form-control-label">Image</label>
                            <input name="image" id="image" type="file" class="form-control">
                            @error('image')
                                <p class="text-sm text-danger ms-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn btn-success btn-sm px-3 mb-0 me-1">
                                <i class="fa fa-check me-1" aria-hidden="true"></i>
                                Submit
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