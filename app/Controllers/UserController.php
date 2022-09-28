<?php

namespace App\Controllers;

use App\Core\Validation;
use App\Models\User;
use App\Core\Hash;
use App\Core\Request;

class UserController extends BaseController
{
    public function login(Request $request)
    {
        Validation::make(
            $request->payload,
            [
                'email' => ['required', 'email'],
                'password' => ['required', 'string']
            ]
        );
        //TODO migth create core to validate input but it takes a lot of time
        $this->attempt($request->payload);


    }

    protected function attempt($credentials): bool
    {
        $user = User::where('email',$request->payload['email'])->first();

        Hash::check($request->payload['password'], $user['password']);

        return false;
    }

    public function logout(Request $request)
    {
        //TODO
    }
}