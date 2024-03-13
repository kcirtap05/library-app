<?php

namespace App\Http\Controllers;

use App\Http\Requests\LibraryRequest;
use App\Services\LibraryService;

class LibraryController extends Controller
{
    //
    protected $service;
    public function __construct(LibraryService $service)
    {
        $this->service = $service;
    }
   
    public function create(LibraryRequest $request) {
        return $this->service->create($request->validated());
    }
    public function update($id, LibraryRequest $request) {
        return $this->service->update($id,$request->validated());
    }
    public function destroy($id) {
        return $this->service->delete($id);
    }
    public function grid() {
        return $this->service->grid();
    }
    public function show($id) {
        return $this->service->show($id);
    }
}
