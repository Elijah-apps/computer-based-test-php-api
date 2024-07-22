<?php

namespace Controllers;

use Models\User;
use Leaf\Auth;
use Leaf\Http\Request;
use Leaf\Http\Response;

class UserController
{
    public function register(Request $request)
    {
        $data = $request->body();
        $data['password'] = Auth::hash($data['password']);
        $user = User::create($data);
        Response::json($user, 201);
    }

    public function login(Request $request)
    {
        $data = $request->body();
        $user = User::where('email', $data['email'])->first();
        if ($user && Auth::verify($data['password'], $user->password)) {
            Response::json(['message' => 'Login successful', 'user' => $user]);
        } else {
            Response::json(['message' => 'Invalid credentials'], 401);
        }
    }
}
