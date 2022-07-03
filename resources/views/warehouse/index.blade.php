@extends('layouts.admin')

@push('title')
    Warehouse
@endpush

@push('styles')
    <style>
        .page-item.active>span {
            color: #ffffff;
        }
    </style>
@endpush

@section('content')
    <div class="card mb-4">
        <div class="card-header pb-0 d-flex justify-content-between">
            <h6>Warehouse Data</h6>
            <a href="{{ route('warehouse.create') }}" class="btn btn-info btn-sm px-3 mb-0 me-1">
                <i class="fa fa-plus me-1" aria-hidden="true"></i>
                Add New
            </a>
        </div>
        <div class="card-body px-0 pt-0 pb-2">
            <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                    <thead>
                        <tr>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No.</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Name</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Branch</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($warehouses as $k => $warehouse)
                            <tr>
                                <td class="align-middle">
                                    <span class="text-sm font-weight-bold ps-3">
                                        {{ $warehouses->firstItem() + $k }}.
                                    </span>
                                </td>
                                <td class="align-middle">
                                    <span class="text-sm font-weight-bold ps-3">
                                        {{ $warehouse->name }}
                                    </span>
                                </td>
                                <td class="align-middle">
                                    <span class="text-sm font-weight-bold">
                                        {{ $warehouse->branch }}
                                    </span>
                                </td>
                                <td class="align-middle">
                                    <a href="{{ route('warehouse.show', $warehouse) }}" class="btn btn-success btn-sm px-3 mb-0 me-1">
                                        <i class="far fa-eye me-1" aria-hidden="true"></i>
                                        Show
                                    </a>
                                    <a href="{{ route('warehouse.edit', $warehouse) }}" class="btn btn-primary btn-sm px-3 mb-0 me-1">
                                        <i class="fa fa-pencil-alt me-1" aria-hidden="true"></i>
                                        Edit
                                    </a>
                                    <button onclick="deleteItem('{{ route('warehouse.destroy', $warehouse) }}')" class="btn btn-danger btn-sm px-3 mb-0 me-1">
                                        <i class="far fa-trash-alt me-1" aria-hidden="true"></i>
                                        Delete
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer mb-0">
            <hr class="horizontal dark mt-0">
            <div class="d-flex justify-content-between align-items-center">
                <p class="text-sm">
                    Showing
                    {{ $warehouses->firstItem() }}
                    to
                    {{ $warehouses->lastItem() }}
                    of
                    {{ $warehouses->total() }}
                    results
                </p>
                {{ $warehouses->links() }}
            </div>
        </div>
    </div>
    @include('partials.modal')
@endsection
