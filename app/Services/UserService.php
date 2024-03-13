<?php

namespace App\Services;

use App\User;
use Illuminate\Support\Facades\Auth;

class UserService  
{
    private $model;
    public $responseCode = 200;
    public $responseMsg = 'Successful';
    public $responseData = null;
    public $reponseLine = '';

    public function __construct(User $model)
    {
        $this->model = $model;
    }
    public function register ($data) {
        $this->model->create($data);
        return response()->json([
            'message' => 'Successfully created user!'
        ], 201);
    }
    
}
