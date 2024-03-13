<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Book extends Model
{
    use SoftDeletes;
    protected $table = 'books';
    protected $guarded = ['id'];

    public function library() {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
