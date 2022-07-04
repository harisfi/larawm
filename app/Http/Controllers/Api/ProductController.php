<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Traits\ApiResponse;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    use ApiResponse;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $products = Product::orderBy('name')->get();
            return $this->success($products);
        } catch (\Exception $e) {
            report($e);
            return $this->failure();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $product = Product::where(['id' => $id])->with('warehouse')->get();
            if ($product->count() > 0) {
                return $this->success($product);
            } else {
                return $this->failure(404);
            }
        } catch (\Exception $e) {
            report($e);
            return $this->failure();
        }
    }

    /**
     * Search the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        try {
            $searchBy = $request->input('search_by');
            $query = '%' . $request->input('query') . '%';
            $showWarehouse = ($request->input('show_warehouse') == 'true');
            $with = [];

            if (!in_array($searchBy, ['code', 'name'])) {
                return $this->failure(400);
            }

            if ($showWarehouse) {
                $with = 'warehouse';
            }

            $product = Product::where($searchBy, 'like', $query)->with($with)->get();

            if ($product->count() > 0) {
                return $this->success($product);
            } else {
                return $this->failure(404);
            }
        } catch (\Exception $e) {
            report($e);
            return $this->failure();
        }
    }
}
