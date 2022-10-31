<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductCreateRequest;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ProductsController extends Controller
{
    public function index()
    {
        return Product::paginate(10);
    }

    public function show($id)
    {
        return Product::find($id);
    }

    public function store(ProductCreateRequest $request)
    {
        $data = $request->all();
        $product = Product::create($data);

        return response($product, Response::HTTP_CREATED);
    }

    public function update(Request $request, $id)
    {
        $product = Product::find($id);
        $product->update($request->only('name', 'description', 'tension', 'brand', 'image'));

        return response($product, Response::HTTP_ACCEPTED);
    }

    public function destroy($id)
    {
        Product::destroy($id);

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
