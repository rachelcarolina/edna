<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class ProductsController extends Controller
{
    public function getAll() {
        return Product::all();
    }
   
    public function get(Product $product) {
        return $product;
    }

    public function store(Request $request) {
        $this->validate($request, [
            'name' => 'required|unique:products|max:255',
            'description' => 'required',
            'price' => 'integer'
        ]);
        $product = Product::create($request->all());
        return response()->json($product, 200);
    }

    public function update(Request $request, Product $product) {
        $product->update($request->all());
        return response()->json($product, 200);
    }

    public function delete(Product $product) {
        $product->delete();
        return response()->json(null, 200);
    }

}
