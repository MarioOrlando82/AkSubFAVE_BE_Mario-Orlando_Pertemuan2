<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use App\Models\Menu;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class ApiController extends Controller
{
    public function index()
    {
        $users = User::all();
        return UserResource::collection($users);
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ], [
            'email.required' => 'Email is Required Dude!',
            'password.required' => 'Password is Required Dude!',
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
        }

        return $user->createToken($request->email)->plainTextToken;
    }

    public function logout(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ], [
            'email.required' => 'Email is Required Dude!',
            'password.required' => 'Password is Required Dude!',
        ]);

        $user = User::where('email', $request->email)->first();

        $user->tokens()->delete();
    }

    public function create(Request $req)
    {
        $menu = Menu::create([
            'Name' => $req -> Name,
            'Description' => $req -> Description,
            'Image' => "ChickenKatsu.jpg"
        ]);
        return response()->json(["message" => "success", "data" => $menu, "created_by" => Auth::user()]);
    }

    public function update($id, Request $req)
    {
        $menu = Menu::find($id)->update([
            'Name' => $req -> Name,
            'Description' => $req -> Description,
            'Image' => "ChickenKatsu.jpg"
        ]);
        return response()->json(["message" => "success", "data" => $menu, "created_by" => Auth::user()]);
    }

    public function delete($id)
    {
        $menu = Menu::find($id);
        Menu::destroy($id);
        return response()->json(["message" => "success Deleted", "data" => $menu, "created_by" => Auth::user()]);
    }
}

