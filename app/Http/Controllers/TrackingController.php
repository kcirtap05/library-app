<?php

namespace App\Http\Controllers;

use App\Http\Requests\TrackingRequest;
use App\Services\TrackingService;

class TrackingController extends Controller
{
    //
    protected $service;
    public function __construct(TrackingService $service)
    {
        $this->service = $service;
    }
   
    public function create(TrackingRequest $request) {
        return $this->service->create($request->validated());
    }
}
