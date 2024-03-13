<?php

namespace App\Services;

use App\Models\Book;
use App\Models\Tracking;
use Illuminate\Support\Facades\Auth;

class TrackingService  
{
    private $tracking;
    private $book;
    public $responseCode = 200;
    public $responseMsg = 'Successful';
    public $responseData = null;
    public $reponseLine = '';

    public function __construct(Tracking $tracking, Book $book)
    {
        $this->tracking = $tracking;
        $this->book = $book;
    }
    public function create ($data) {
        $current_user = Auth::guard('api')->user();
        if ($current_user->library_id === $data['library_id']) {
            $books = $this->book->find($data['book_id']);
            if ($books->status === 'available') {
                $data['user_id'] = $current_user->id;
                $data['borrowed_date'] = date('Y-m-d');
                $this->tracking->create($data);
                $this->book->find($data['book_id'])->update([
                    'status' => 'borrowed',
                ]);
                return response()->json([
                    'message' => 'Successfully borrowed book!'
                ], 200);
            }
            return response()->json([
                'message' => 'Book is not available!'
            ], 200);
        } else {
            return response()->json([
                'message' => 'Not Authorized to borrow in this library!'
            ], 400);
        }
           
    }
    
}
