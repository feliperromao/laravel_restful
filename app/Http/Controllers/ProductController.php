<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest as Request;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class ProductController extends Controller
{
    public function index()
    {
        $minutes = Carbon::now()->addMinutes(10);

        $products = Cache::remember('api:products', $minutes, function(){
            return Product::all();
        });

        return $products;
    }

    public function show(Product $product)
    {
        return $product;
    }

    public function store(Request $request)
    {
        Cache::forget('api:products');
        
        $data = $request->all();
        $data['user_id'] = Auth::user()->id;

        return Product::create($data);
    }

    public function update(Request $request, Product $product)
    {
        Cache::forget('api:products');

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
        Cache::forget('api:products');

        $this->authorize('delete', $product);
        $product->delete();
    }
}
