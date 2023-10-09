<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\product;
use Illuminate\Support\Facades\Gate;

class productsController extends Controller
{
    function __construct() {
        $this->middleware('auth')->except(['getAllProducts', 'getProductById']);
    }

    function getAllProducts() {
        $products = product::paginate(5);
        return view("products", ["products" => $products]);
    }

    function getProductById($id) {
        $product = product::findOrFail($id);
        return view("product", ["product" => $product]);
    }

    function deleteProductById($id) {
        $product = product::findOrFail($id);
        $response = Gate::inspect('forbidden_update_delete', $product);
        
        if($response->allowed() || Gate::allows('is-admin')) {
            $product->delete();
            return to_route('products');
        }
        return abort(403);
    }

    function createProduct() {
        $categories = Category::all();
        return view("createProduct", ["categories" => $categories]);
    }

    function store() {
        // $product = new product();

        $requestData = \request()->all();
        $requestData['creator_id'] = Auth::id();
        product::create($requestData);
        return to_route('products');
    }

    function updateProductById($id) {
        $product = product::findOrFail($id);
        $response = Gate::inspect('forbidden_update_delete', $product);

        if($response->allowed() || Gate::allows('is-admin')) {
            $categories = Category::all();
            return view("editProduct", ["product" => $product, "categories" => $categories]);
        }
        return abort(403);
    }

    function storeEditProductById($id) {
        $product = product::findOrFail($id);

        $product->name = \request()->get('name');
        $product->image = \request()->get('image');
        $product->price = \request()->get('price');
        $product->category_id = \request()->get('category_id');
        $product->description = \request()->get('description');

        $product->save();
        return view("product", ["product" => $product]);
    }
}
