<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Product;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\File;

class ProductDashboard extends Controller
{
    public function index()
    {
        $products = Product::all();
        if ($products) {

            return response()->json([
                'message' => "All Data Have Been Received",
                'status' => Response::HTTP_OK,
                'data' => $products,
            ], Response::HTTP_OK);

        } else {

            return response()->json([
                'message' => "No Data Received",
                'status' => Response::HTTP_NO_CONTENT,
            ], Response::HTTP_NO_CONTENT);
        }
    }

    public function show($id)
    {
        $product = Product::find($id);

        if ($product) {

            return response()->json([
                'message' => "Products' Data Has Been Founded",
                'starus' => Response::HTTP_OK,
                'data' => $product,
            ], Response::HTTP_OK);

        } else {
            return response()->json([
                'message' => "Products' Data Has NOT Been Founded",
                'starus' => Response::HTTP_NO_CONTENT,
            ], Response::HTTP_NO_CONTENT);
        }
    }

    public function store(ProductRequest $productRequest)
    {
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

        return response()->json([
            'message' => 'Product created successfully',
            'status' => Response::HTTP_CREATED,
        ], Response::HTTP_CREATED);
    }

    public function update(ProductRequest $productRequest, $id)
    {
        $product = Product::find($id);

        if ($product) {

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
            return response()->json([
                'message' => 'Product Has Been Updated',
                'status' => Response::HTTP_OK,
            ], Response::HTTP_OK);

        } else {
            return response()->json([
                'message' => 'Product Not Found',
                'status' => Response::HTTP_NOT_FOUND,
            ], Response::HTTP_NOT_FOUND);
        }
    }

    public function destroy($id)
    {
        $product = Product::find($id);
        if ($product) {
            if (File::exists(public_path("products/img/" . $product->img)) && $product->img !== "feature-image.jpg") {
                // File::delete(public_path("products/img/" . $product->img));
                unlink(public_path("products/img/" . $product->img));
            }
            $product->delete();
            return response()->json([
                'message' => 'Product Deleted Successfully',
                'status' => Response::HTTP_OK,
            ], Response::HTTP_OK);

        } else {
            return response()->json([
                'message' => 'Product Not Found',
                'status' => Response::HTTP_NO_CONTENT,
            ], Response::HTTP_NO_CONTENT);
        }
    }
}
