<?php

namespace App\Http\Controllers;

use App\Http\Requests\ShiperRequest;
use App\Models\Shiper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ShiperController extends Controller
{
    public function index()
    {
        $shipers = Shiper::all();
        return view('admin.shiper.index', ['shiper' => $shipers]);
    }
    public function search(Request $request)
    {
        $query = $request->input('q');

        $shiper = Shiper::when($query, function ($queryBuilder) use ($query) {
            return $queryBuilder->where('id', 'LIKE', "%{$query}%")
                ->orWhere('name', 'LIKE', "%{$query}%");
        }, function ($queryBuilder) {
            return $queryBuilder->orderBy('id');
        })->get();

        return view('admin.shiper.index', compact('shiper'));
    }

    public function show($id)
    {
        $shiper = Shiper::findOrFail($id);
        return view('admin.shiper.show', ['shiper' => $shiper]);
    }

    public function create()
    {
        return view('admin.shiper.create');
    }

    public function edit($id)
    {
        $shiper = Shiper::findOrFail($id);
        return view('admin.shiper.edit', ['shiper' => $shiper]);
    }
    public function store(ShiperRequest $ShiperRequest)
    {

        //delete the image from local first then create a new one
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
        return redirect()->route('shipperdashboard.index')->with('success', 'Shiper Has Been Successfully Created');
    }

    public function update(ShiperRequest $ShiperRequest, $id)
    {
        $shiper = Shiper::findOrFail($id);
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
        return redirect()->route('shipperdashboard.index')->with('success', 'Shiper Has Been Successfully Updated');
    }

    public function destroy($id)
    {
        $shiper = Shiper::findOrFail($id);
        if (File::exists(public_path("shipers/img/" . $shiper->img)) && $shiper->img !== "shipper.png") {
            unlink(public_path("shipers/img/" . $shiper->img));
        } else {
            dd('canot delete');
        }
        $shiper->delete();
        return redirect()->route('shipperdashboard  .index')->with('success', 'Shiper Has Been Successfully Deleted');
    }
}
