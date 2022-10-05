<?php

namespace App\Controllers;

use App\Core\Exceptions\UnauthorizedException;
use App\Core\Validation;
use App\Core\Controller;
use App\Core\Response;
use App\Core\Request;
use App\Core\Auth;
use App\Models\Student;

class StudentController extends Controller
{
    /**
     * @param Request $request
     * @return int
     * @throws UnauthorizedException
     */
    public function index(Request $request)
    {
        Validation::check(
            $request->payload,
            [
                'page'  => ['sometimes', 'unsingnedInteger'],
                'perPage' => ['sometimes', 'unsingnedInteger']
            ]
        );

        return Response::json(
            Student::paginate(
                $request->payload['page'] ?? 1,
                $request->payload['perPage'] ?? 15
            )
        );
    }
}