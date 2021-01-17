<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Borrow;
use App\Models\Book;
class BorrowBook extends Model
{
    //
    public function borrow(){
        return $this->belongsTo(Borrow::class);
    }

    public function book(){
        return $this->belongsTo(Book::class);
    }
}
