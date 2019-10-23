<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Log;

class ProductController extends Controller
{
    public function index()
    {
        return Product::all();
    }

    public function show(Product $product)
    {
        return $product;
    }

    public function store(Request $request)
    {
        return Product::create($request->all());
    }

    public function update(Request $request, Product $product)
    {
        if ($product->update($request->all()) ){
            return $product;
        }
        return response()->json([
            'status' => '500',
            'message' => 'Erro ao atualizar'
        ], 500);
    }

    public function destroy(Product $product)
    {
        $product->delete();
    }
}
