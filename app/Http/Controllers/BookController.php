<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookRequest;
use App\Services\BookService;

class BookController extends Controller
{
    //
    protected $service;
    public function __construct(BookService $service)
    {
        $this->service = $service;
    }
   
    public function create(BookRequest $request) {
        return $this->service->create($request->validated());
    }
    public function update($id, BookRequest $request) {
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
