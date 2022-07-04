<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Traits\ApiResponse;
use App\Models\Warehouse;
use Illuminate\Http\Request;

class WarehouseController extends Controller
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
            $warehouses = Warehouse::orderBy('name')->withCount('products')->get();
            return $this->success($warehouses);
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
            $warehouse = Warehouse::where(['id' => $id])->with('products')->get();
            if ($warehouse->count() > 0) {
                return $this->success($warehouse);
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
            $showProducts = ($request->input('show_products') == 'true');
            $with = [];

            if (!in_array($searchBy, ['name', 'branch'])) {
                return $this->failure(400);
            }

            if ($showProducts) {
                $with = 'products';
            }

            $warehouse = Warehouse::where($searchBy, 'like', $query)->with($with)->get();

            if ($warehouse->count() > 0) {
                return $this->success($warehouse);
            } else {
                return $this->failure(404);
            }
        } catch (\Exception $e) {
            report($e);
            return $this->failure();
        }
    }
}
