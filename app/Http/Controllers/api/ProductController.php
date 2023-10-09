<?php

namespace App\Http\Controllers\api;

use App\Http\Resources\ProductResource;
use App\Models\product;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = product::all();
        return ProductResource::collection($products);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'image' => 'required',
            'price' => 'required',
            'category_id' => 'required',
        ]);

        if($validator->fails()) {
            return response($validator->errors()->all(), 422);
        }

        $product = product::create($request->all());
        // return response($product, 201);
        // return (new ProductResource($product))->response()->setStatusCode(201);
        return new ProductResource($product);
    }

    /**
     * Display the specified resource.
     */
    public function show(product $product)
    {
        return new ProductResource($product);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, product $product)
    {
        $product->update($request->all());
        return new ProductResource($product);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(product $product)
    {
        $product->delete();
        return "deleted";
    }
}
