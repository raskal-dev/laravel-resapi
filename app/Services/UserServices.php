<?php

namespace App\Services;

use App\Http\Controllers\BaseController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Passport\TokenRepository;

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
        return $this->sendResponse([], "User created !");
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

    public function logout()
    {
        $tokens = Auth::user()->tokens;
        $tokenRepository = app(TokenRepository::class);
        foreach ($tokens as $token) {
            $tokenRepository->revokeAccessToken($token->id);
        }
        return $this->sendResponse([], "User logged out !");
    }

    public function update(Request $request, $user)
    {
        User::find($user->id)->update($request->all());
        return $this->sendResponse([], "User updated");
    }

    public function delete($user)
    {
        User::find($user->id)->destroy();
        return $this->sendResponse([], "User deleted successfully !");
    }

}
