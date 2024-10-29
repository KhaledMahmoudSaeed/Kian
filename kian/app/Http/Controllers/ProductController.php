<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{

    public function index()
    {
        $products = Product::all();
        return view('admin.product.index', ['product' => $products]);
    }
    public function search(Request $request)
    {
        $query = $request->input('q');

        $product = Product::when($query, function ($queryBuilder) use ($query) {
            return $queryBuilder->where('id', 'LIKE', "%{$query}%")
                ->orWhere('name', 'LIKE', "%{$query}%");
        }, function ($queryBuilder) {
            return $queryBuilder->orderBy('id');
        })->get();

        return view('admin.product.index', compact('product'));
    }

    public function show($id)
    {

        $product = Product::findOrFail($id);
        return view('admin.product.show', ['product' => $product]);
    }

    public function create()
    {
        return view('admin.product.create');
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('admin.product.edit', ['product' => $product]);
    }
    public function store(ProductRequest $productRequest)
    {

        //delete the image from local first then create a new one
        $imageName = "feature-image.jpg";
        if ($productRequest->hasFile("img")) {
            $image = $productRequest->img;
            $imageName = rand(0, 1243) . "_0" . time() . "." . $image->extension();
            $image->move(public_path("products/img/"), $imageName);
        }
        Product::create([
            'name' => $productRequest->name,
            'description' => $productRequest->description,
            'price' => $productRequest->price,
            'quantity' => $productRequest->quantity,
            'sale' => $productRequest->sale,
            'img' => $imageName,
            'shiper_id' => $productRequest->shiper_id,
        ]);
        return redirect()->route('productdashboard.index')->with('success', 'PRODUCT_CREATED');
    }

    public function update(ProductRequest $productRequest, $id)
    {
        $product = Product::findOrFail($id);
        $imageName = 'feature-image.jpg';
        if ($productRequest->hasFile("img")) {
            if (File::exists(public_path("products/img/" . $product->img)) && $product->img !== "feature-image.jpg") {
                // File::delete(public_path("products/img/" . $product->img));
                unlink(public_path("products/img/" . $product->img));
            }
            $image = $productRequest->img;
            $imageName = rand(0, 1243) . "_0" . time() . "." . $image->extension();
            $image->move(public_path("products/img/"), $imageName);
        }
        $product->update([
            'name' => $productRequest->name,
            'description' => $productRequest->description,
            'price' => $productRequest->price,
            'quantity' => $productRequest->quantity,
            'sale' => $productRequest->sale,
            'img' => $imageName,
            'shiper_id' => $productRequest->shiper_id,
        ]);
        return redirect()->route('productdashboard.index')->with('success', 'PRODUCT_UPDATED');
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        if (File::exists(public_path("products/img/" . $product->img)) && $product->img !== "feature-image.jpg") {
            // File::delete(public_path("products/img/" . $product->img));
            unlink(public_path("products/img/" . $product->img));
        }
        $product->delete();
        return redirect()->route('productdashboard.index')->with('success', "PRODUCT_DELETED");
    }
}
