@extends('layouts.admin')

@push('title')
    Product Detail
@endpush

@section('content')
    <div class="card mb-4">
        <div class="card-header pb-0 d-flex justify-content-between">
            <h6>Product Detail</h6>
            <a href="{{ route('product.index') }}" class="btn btn-warning btn-sm px-3 mb-0 me-1">
                <i class="fa fa-arrow-left me-1" aria-hidden="true"></i>
                Back
            </a>
        </div>
        <div class="card-body px-0 pt-0 pb-2">
            <div class="row m-4 align-items-center">
                <div class="col-auto text-8xl text-warning text-gradient">
                    <i class="fa fa-box"></i>
                </div>
                <div class="col">
                    <div class="text-sm font-weight-bold m-4">
                        <ul class="list-group">
                            <li class="list-group-item">Code: {{ $product->code }}</li>
                            <li class="list-group-item">Name: {{ $product->name }}</li>
                            <li class="list-group-item">Stock: {{ $product->stock }}</li>
                            <li class="list-group-item">Warehouse Name: {{ $product->warehouse->name }}</li>
                            <li class="list-group-item">Warehouse Branch: {{ $product->warehouse->branch }}</li>
                            <li class="list-group-item">
                                Image:
                                @if ($product->image)
                                    <br><br>
                                    <a href="{{ asset($product->image) }}" target="_blank">
                                        <img src="{{ asset($product->image) }}" alt="{{ $product->image }}" class="img-thumbnail w-30">
                                    </a>
                                @else
                                    -
                                @endif
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection