<?php

namespace App\Services;

use App\Models\Library;
use Illuminate\Support\Facades\Auth;

class LibraryService  
{
    private $library;
    public $responseCode = 200;
    public $responseMsg = 'Successful';
    public $responseData = null;
    public $reponseLine = '';

    public function __construct(Library $library)
    {
        $this->library = $library;
    }
    public function create ($data) {
        return $this->library->create($data);
    }
    public function grid() {
        return $this->library->with('books')->simplePaginate();
    }
    public function update($id,$data) {
        return tap($this->library->find($id))->update($data);
    }
    public function delete($id) {
        return tap($this->library->find($id))->delete();
    }
    public function show($id) {
        return $this->library->find($id);
    }
    
}
