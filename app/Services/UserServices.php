<?php

namespace App\Services;

use App\Http\Controllers\BaseController;
use App\Models\User;
use Illuminate\Http\Request;

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


}
