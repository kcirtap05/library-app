<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Services\UserService;

class UserController extends Controller
{    //
    protected $service;
    public function __construct(UserService $service)
    {
        $this->service = $service;
    }
   
    public function register(UserRequest $request) {
        return $this->service->register($request->validated());
    }
}
