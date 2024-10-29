<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\ShiperRequest;
use App\Models\Shiper;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Http;

class ShiperDashboardController extends Controller
{
    public function index()
    {
        $shipers = Shiper::all();
        if ($shipers) {

            return response()->json([
                'message' => 'All Data Has Been Recived',
                'status' => Response::HTTP_OK,
                'data' => $shipers,
            ], Response::HTTP_OK);
        } else {
            return response()->json([
                'message' => 'No Data Received',
                'status' => Response::HTTP_NO_CONTENT,
            ], Response::HTTP_NO_CONTENT);
        }
    }

    public function show($id)
    {
        // $shiper = Shiper::where('id', '=', $id)->first();
        $shiper = Shiper::find($id);
        if ($shiper !== null) {

            return response()->json([
                'message' => "Shipper' Data Has Been Founded",
                'starus' => Response::HTTP_OK,
                'data' => $shiper,
            ], Response::HTTP_OK);

        }
        return response()->json([
            'message' => "Shipper' Data Has NOT Been Founded",
            'starus' => Response::HTTP_NO_CONTENT,
        ], Response::HTTP_NO_CONTENT);

    }
    public function store(ShiperRequest $ShiperRequest)
    {
        $imageName = "shipper.png";
        if ($ShiperRequest->hasFile("img")) {
            $image = $ShiperRequest->img;
            $imageName = rand(0, 1243) . "_0" . time() . "." . $image->extension();
            $image->move(public_path("shipers/img/"), $imageName);
        }
        Shiper::create([
            'name' => $ShiperRequest->name,
            'country' => $ShiperRequest->country,
            'phone' => $ShiperRequest->phone,
            'img' => $imageName,
        ]);

        return response()->json([
            'message' => 'Shiper created successfully',
            'status' => Response::HTTP_CREATED,
        ], Response::HTTP_CREATED);
    }

    public function update(ShiperRequest $ShiperRequest, $id)
    {
        $shiper = Shiper::find($id);

        if ($shiper) {

            $imageName = "shipper.png";
            if ($ShiperRequest->hasFile("img")) {
                if (File::exists(public_path("shipers/img/" . $shiper->img)) && $shiper->img !== "shipper.png") {
                    unlink(public_path("shipers/img/" . $shiper->img));
                }
                $image = $ShiperRequest->img;
                $imageName = rand(0, 1243) . "_0" . time() . "." . $image->extension();
                $image->move(public_path("shipers/img/"), $imageName);
            }
            $shiper->update([
                'name' => $ShiperRequest->name,
                'country' => $ShiperRequest->country,
                'phone' => $ShiperRequest->phone,
                'img' => $imageName,
            ]);
            return response()->json([
                'message' => 'Shiper Has Been Updated',
                'status' => Response::HTTP_OK,
            ], Response::HTTP_OK);

        } else {
            return response()->json([
                'message' => 'Shiper Not Found',
                'status' => Response::HTTP_NOT_FOUND,
            ], Response::HTTP_NOT_FOUND);
        }
    }
    public function destroy($id)
    {
        $shiper = Shiper::find($id);
        if ($shiper) {
            if (File::exists(public_path("shipers/img/" . $shiper->img)) && $shiper->img !== "shipper.png") {
                unlink(public_path("shipers/img/" . $shiper->img));
            }
            $shiper->delete();
            return response()->json([
                'message' => 'Shiper Deleted Successfully',
                'status' => Response::HTTP_OK,
            ], Response::HTTP_OK);

        } else {
            return response()->json([
                'message' => 'Shiper Not Found',
                'status' => Response::HTTP_NO_CONTENT,
            ], Response::HTTP_NO_CONTENT);
        }
    }
}
