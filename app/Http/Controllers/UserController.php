<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserLoginFormRequest;
use App\Models\User;

class UserController extends Controller
{
    function login()
    {
        return view('auth.login');
    }

    function register()
    {
        return view('auth.register');
    }

    function checkout()
    {
        return view('auth.checkout');
    }

    public function postLoginAuth(UserLoginFormRequest $req)
    {
        $queryParams = $req->only('email', 'password');

        $user = User::where('email', $queryParams['email'])->get()[0] ?? null;

        if ($user && password_verify($queryParams['password'], $user->password))
            dd('authenticated');

        dd('not authenticated');
    }
}
