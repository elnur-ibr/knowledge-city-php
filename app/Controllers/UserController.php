<?php

namespace App\Controllers;

use App\Core\Exceptions\UnauthorizedException;
use App\Core\Validation;
use App\Core\Controller;
use App\Core\Response;
use App\Core\Request;
use App\Core\Auth;

class UserController extends Controller
{
    /**
     * @param Request $request
     * @return int
     * @throws UnauthorizedException
     */
    public function login(Request $request)
    {
        Validation::check(
            $request->payload,
            [
                'email'    => ['required', 'email'],
                'password' => ['required', 'string'],
                'remember_me' => ['sometimes', 'bool']
            ]
        );

        return Response::json(
            Auth::attempt(
                $request->payload,
                $request->payload['remember_me'] ?? false
            )
        );
    }

    /**
     * @param Request $request
     * @return int
     */
    public function logout(Request $request)
    {
        Auth::destroy();

        return Response::json('Ok.');
    }
}