<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Warehouse;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $totalWarehouse = Warehouse::all()->count();
        $totalProduct = Product::all()->count();

        return view('dashboard', compact(
            'totalWarehouse',
            'totalProduct'
        ));
    }
}
