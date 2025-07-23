<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthSanctumController extends Controller
{
    public function register(Request $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return response()->json($user);
    }

    public function login(Request $request)
    {
        $user = User::where('email', $request->email)->first();

        if (! $user || ! Hash::check($request->password, $user->password)) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }

        return response()->json([
            'token' => $user->createToken('token')->plainTextToken
        ]);
    }

    public function me(Request $request)
    {
        return response()->json($request->user());
    }
}