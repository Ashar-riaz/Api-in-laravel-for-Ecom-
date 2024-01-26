<?php
// app/Http/Controllers/ProductController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'file' => 'required|string',
            'price' => 'required|numeric',
            'compare_price' => 'nullable|numeric',
        ]);
        $product = new Product;
        $product->title = $request->input("title");
        $product->category = $request->input("category");
        $product->description = $request->input("description");
        $product->price = $request->input("price");
        $product->compare_price = $request->input("compare_price"); 
        $file = $request->file("file");

        if ($file) {
            $product->file = $file->store("products");
        }
        $product->save();
        return $product;
    }
    public function index()
    {
        $products = Product::all();
        return response()->json($products);
    }
    public function update(Request $request, $id)
    {
        $product = Product::find($id);

        if (!$product) {
            return response()->json(['message' => 'Product not found'], 404);
        }

        $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'file' => 'required|string',
            'price' => 'required|numeric',
            'compare_price' => 'nullable|numeric',
        ]);

        $product->update($request->all());

        return response()->json(['message' => 'Product updated successfully', 'data' => $product]);
    }
    public function del($id)
    {
        $result=Product::where('id',$id)->delete();
        if($result){
            return ["result"=>"product has been delete"];
        }
        else{
            return ["result"=>"product has not delete"];

        }
    }
    public function getProduct($id)
    {
    return Product::find($id);
    }
    public function search($key)
    {
        return Product::where('title','LIKE','%'. $key .'%')->get();
    }
}

