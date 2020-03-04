<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Service\UserManagementService;

class UserManagementController extends Controller
{
    public function signUp(Request $request)
    {
        return UserManagementService::signUp($request->all());
    }

    public function login(Request $request)
    {
        return UserManagementService::login($request->all());
    }

    public function signUpForm()
    {
        return view("signup");
    }

    public function loginForm()
    {
        return view("login");
    }
}
