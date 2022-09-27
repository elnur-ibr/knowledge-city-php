<?php

namespace App\Controllers;

use App\Models\User;
use App\Core\Hash;
use App\Core\Request;

class UserController extends BaseController
{
    public function login(Request $request)
    {
        //TODO migth create core to validate input but it takes a lot of time
        $user = User::where('email',$request->payload['email'])->first();
        dd($user);

        dd(
            Hash::check($request->payload['password'], $user['password'])
        );
    }

    public function logout(Request $request)
    {
        //TODO
    }
}