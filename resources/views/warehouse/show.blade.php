@extends('layouts.admin')

@push('title')
    Warehouse Detail
@endpush

@section('content')
    <div class="card mb-4">
        <div class="card-header pb-0 d-flex justify-content-between">
            <h6>Warehouse Detail</h6>
            <a href="{{ route('warehouse.index') }}" class="btn btn-warning btn-sm px-3 mb-0 me-1">
                <i class="fa fa-arrow-left me-1" aria-hidden="true"></i>
                Back
            </a>
        </div>
        <div class="card-body px-0 pt-0 pb-2">
            <div class="row m-4 align-items-center">
                <div class="col-auto text-8xl text-success text-gradient">
                    <i class="fa fa-city"></i>
                </div>
                <div class="col">
                    <div class="text-sm font-weight-bold m-4">
                        <ul class="list-group">
                            <li class="list-group-item">Name: {{ $warehouse->name }}</li>
                            <li class="list-group-item">Branch: {{ $warehouse->branch }}</li>
                        </ul>
                    </div>
                </div>
            </div>
            <h6 class="mx-4">Products:</h6>
            <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                    <thead>
                        <tr>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No.</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Code</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Name</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Stock</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($warehouse->products as $k => $product)
                            <tr>
                                <td class="align-middle">
                                    <span class="text-sm font-weight-bold ps-3">
                                        {{ $k + 1 }}.
                                    </span>
                                </td>
                                <td class="align-middle">
                                    <span class="text-sm font-weight-bold ps-3">
                                        {{ $product->code }}
                                    </span>
                                </td>
                                <td class="align-middle">
                                    <span class="text-sm font-weight-bold ps-3">
                                        {{ $product->name }}
                                    </span>
                                </td>
                                <td class="align-middle">
                                    <span class="text-sm font-weight-bold">
                                        {{ $product->stock }}
                                    </span>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection