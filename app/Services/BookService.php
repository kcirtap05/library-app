<?php

namespace App\Services;

use App\Models\Book;
use Illuminate\Support\Facades\Auth;

class BookService  
{
    private $book;
    public $responseCode = 200;
    public $responseMsg = 'Successful';
    public $responseData = null;
    public $reponseLine = '';

    public function __construct(Book $book)
    {
        $this->book = $book;
    }
    public function create ($data) {
        return $this->book->create($data);
    }
    public function grid() {
        return $this->book->simplePaginate();
    }
    public function update($id,$data) {
        return tap($this->book->find($id))->update($data);
    }
    public function delete($id) {
        return tap($this->book->find($id))->delete();
    }
    public function show($id) {
        return $this->book->find($id);
    }
    
}
