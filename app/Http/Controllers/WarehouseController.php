<?php

namespace App\Http\Controllers;

use App\Http\Requests\WarehouseCreateRequest;
use App\Http\Requests\WarehouseEditRequest;
use App\Models\Warehouse;

class WarehouseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $warehouses = Warehouse::orderBy('name')->paginate(5);
        return view('warehouse.index', compact('warehouses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('warehouse.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(WarehouseCreateRequest $request)
    {
        try {
            $validated = $request->validated();
            Warehouse::create($validated);
            return redirect(route('warehouse.index'))->with('flash', [
                'error' => false,
                'msg' => 'A new warehouse has been created.'
            ]);
        } catch (\Exception $e) {
            return redirect(route('warehouse.index'))->with('flash', [
                'error' => true,
                'msg' => 'Failed to create a warehouse.'
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Warehouse  $warehouse
     * @return \Illuminate\Http\Response
     */
    public function show(Warehouse $warehouse)
    {
        return view('warehouse.show', compact('warehouse'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Warehouse  $warehouse
     * @return \Illuminate\Http\Response
     */
    public function edit(Warehouse $warehouse)
    {
        return view('warehouse.edit', compact('warehouse'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Warehouse  $warehouse
     * @return \Illuminate\Http\Response
     */
    public function update(WarehouseEditRequest $request, Warehouse $warehouse)
    {
        try {
            $validated = $request->validated();
            $warehouse->update($validated);
            return redirect(route('warehouse.index'))->with('flash', [
                'error' => false,
                'msg' => 'A warehouse has been updated.'
            ]);
        } catch (\Exception $e) {
            return redirect(route('warehouse.index'))->with('flash', [
                'error' => true,
                'msg' => 'Failed to update a warehouse.'
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Warehouse  $warehouse
     * @return \Illuminate\Http\Response
     */
    public function destroy(Warehouse $warehouse)
    {
        try {
            $warehouse->deleteOrFail();
            return redirect(route('warehouse.index'))->with('flash', [
                'error' => false,
                'msg' => 'A warehouse has been deleted.'
            ]);
        } catch (\Exception $e) {
            return redirect(route('warehouse.index'))->with('flash', [
                'error' => true,
                'msg' => 'Failed to delete a warehouse.'
            ]);
        }
    }
}
