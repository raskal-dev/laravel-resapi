<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Services\UserServices;
use Illuminate\Http\Request;

class UserController extends BaseController
{
    public function __construct(
        private readonly UserServices $userServices
    )
    {
    }

    public function createUser(Request $request)
    {
        return $this->userServices->createUser($request);
    }

    public function listUser()
    {
        return $this->userServices->index();
    }

    public function loginUser(Request $request)
    {
        return $this->userServices->login($request);
    }

    public function logoutUser()
    {
        return $this->userServices->logout();
    }

    public function updateUser(Request $request)
    {
        return $this->userServices->update($request);
    }

    public function deleteUser(Request $request)
    {
        return $this->userServices->delete($request);
    }
}
