<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductCreateRequest;
use App\Http\Requests\ProductEditRequest;
use App\Models\Product;
use App\Models\Warehouse;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::orderBy('name')->paginate(10);
        return view('product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $warehouses = Warehouse::get(['id', 'name']);
        return view('product.create', compact('warehouses'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductCreateRequest $request)
    {
        try {
            $validated = $request->validated();

            $path = Storage::putFile('public/img', $request->file('image'));
            $path = Str::of($path)->replaceFirst('public/', '/storage/');
            $validated['image'] = $path;

            Product::create($validated);
            return redirect(route('product.index'))->with('flash', [
                'error' => false,
                'msg' => 'A new product has been created.'
            ]);
        } catch (\Exception $e) {
            return redirect(route('product.index'))->with('flash', [
                'error' => true,
                'msg' => 'Failed to create a product.'
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('product.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $warehouses = Warehouse::get(['id', 'name']);
        return view('product.edit', compact('product', 'warehouses'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(ProductEditRequest $request, Product $product)
    {
        try {
            $validated = $request->validated();

            if ($request->file('image')) {
                $path = Storage::putFile('public/img', $request->file('image'));
                $path = Str::of($path)->replaceFirst('public/', '/storage/');
                $validated['image'] = $path;
            }

            $product->update($validated);
            return redirect(route('product.index'))->with('flash', [
                'error' => false,
                'msg' => 'A product has been updated.'
            ]);
        } catch (\Exception $e) {
            return redirect(route('product.index'))->with('flash', [
                'error' => true,
                'msg' => 'Failed to update a product.'
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        try {
            $product->deleteOrFail();
            return redirect(route('product.index'))->with('flash', [
                'error' => false,
                'msg' => 'A product has been deleted.'
            ]);
        } catch (\Exception $e) {
            return redirect(route('product.index'))->with('flash', [
                'error' => true,
                'msg' => 'Failed to delete a product.'
            ]);
        }
    }
}
