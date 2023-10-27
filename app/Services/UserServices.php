<?php

namespace App\Services;

use App\Http\Controllers\BaseController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserServices extends BaseController
{
    public function index()
    {
        $users = User::all();
        return $this->sendResponse($users);
    }
    public function createUser(Request $request)
    {
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);
        return response(["message" => "User created"]);
    }

    public function login(Request $request)
    {
        $user = User::where('email', $request->email)->first();

        if (!$user) return $this->sendResponse([], "User not found", 404 );

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $token = $user->createToken('user_token')->accessToken;
            return $this->sendResponse($token, "User logged successfully !");
        }
        return $this->sendResponse([], "Password incorrect !", 401);
    }

}
