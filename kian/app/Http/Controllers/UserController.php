<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class UserController extends Controller
{

    public function index()
    {
        $users = User::all();
        return view('admin.user.index', ['users' => $users]);
    }

    public function search(Request $request)
    {
        $query = $request->input('q');

        $users = User::when($query, function ($queryBuilder) use ($query) {
            return $queryBuilder->where('id', 'LIKE', "%{$query}%")
                ->orWhere('name', 'LIKE', "%{$query}%");
        }, function ($queryBuilder) {
            return $queryBuilder->orderBy('id');
        })->get();

        return view('admin.user.index', compact('users'));
    }

    public function show($id)
    {
        $user = User::find($id);
        return view('admin.user.show', ['user' => $user]);
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('admin.user.edit', ['user' => $user]);
    }

    public function update(UserRequest $userRequest, $id)
    {
        $user = User::findOrFail($id);
        $imageName = 'team_01.jpg';
        if ($userRequest->hasFile('img')) {
            if (File::exists(public_path('users/img/') . $user->img) && $user->img !== "team_01.jpg") {
                unlink(public_path('users/img/') . $user->img);
            }
            $image = $userRequest->img;
            $imageName = rand(0, 1243) . "_0" . time() . "." . $image->extension();
            $image->move(public_path('users/img/'), $imageName);
        }
        $user->update([
            'name' => $userRequest->name,
            'email' => $userRequest->email,
            'phone' => $userRequest->phone,
            'country' => $userRequest->country,
            'img' => $imageName,
        ]);
        return redirect()->route('profile', ['id' => $user->id])->with('success', 'Profile Has Been Successfully Updated');
    }
    public function destroy($id)
    {
        $user = User::find($id);
        if (File::exists(public_path("/users/img/" . $user->img)) && $user->img !== "team_01.jpg" && $user->img !== NULL) {
            unlink(public_path("users/img/" . $user->img));
        }
        $user->delete();
        return redirect()->route("userdashboard.index")->with('success', 'User Has Been Successfully Deleted');
    }
}