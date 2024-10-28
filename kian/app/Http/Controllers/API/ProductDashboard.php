<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Product;
use Illuminate\Http\Response;

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
        $validatedData = $productRequest->validated();
        Product::create($validatedData);

        return response()->json([
            'message' => 'Product created successfully',
            'status' => Response::HTTP_CREATED,
        ], Response::HTTP_CREATED);
    }

    public function update(ProductRequest $productRequest, $id)
    {
        $product = Product::find($id);

        if ($product) {

            $validated_data = $productRequest->validated();
            $product->update($validated_data);
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
