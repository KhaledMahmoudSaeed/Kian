<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\File;

class UserDashboard extends Controller
{
    public function index()
    {
        $users = User::all();
        if (!$users->isEmpty()) {
            return response()->json([
                'message' => "All Data Have Been Received",
                'status' => Response::HTTP_OK,
                'data' => $users,
            ], Response::HTTP_OK);
        } else {
            return response()->json([
                'message' => "There are no data to be sent",
                'status' => Response::HTTP_NO_CONTENT
            ], Response::HTTP_NO_CONTENT);
        }
        ;
    }

    public function show($id)
    {
        $user = User::find($id);
        if ($user) {
            return response()->json([
                'message' => "User's Data Has Been Founded",
                'status' => Response::HTTP_OK,
                'data' => $user,
            ], Response::HTTP_OK);
        } else {
            return response()->json([
                'message' => "User's Data Has NOT Been Founded",
                'status' => Response::HTTP_NOT_FOUND,
            ], Response::HTTP_NOT_FOUND);
        }
    }
    public function destroy($id)
    {
        $user = User::find($id);

        if ($user) {
            if (File::exists(public_path("/users/img/" . $user->img)) && $user->img !== "team_01.jpg" && $user->img !== NULL) {
                unlink(public_path("users/img/" . $user->img));
            }
            $user->delete();
            return response()->json([
                'message' => 'User Deleted Successfully',
                'status' => Response::HTTP_OK,
            ], Response::HTTP_OK);
        } else {
            return response()->json([
                'message' => 'User Not Found',
                'status' => Response::HTTP_NO_CONTENT,
            ], Response::HTTP_NO_CONTENT);
        }
    }


}
