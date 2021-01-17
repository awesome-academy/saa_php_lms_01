<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Book;
use App\Models\User;
class Comment extends Model
{
    protected $fillable = [
        'user_id', 'book_id', 'content', 'parent_id'
    ];
    //
    public function book(){
        return $this->belongsTo(Book::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
