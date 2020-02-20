<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Book;
use App\Models\Author;
class BookAuthor extends Model
{
    //
    public function book(){
        return $this->belongsTo(Book::class);
    }

    public function author(){
        return $this->belongsTo(Author::class);
    }
}
