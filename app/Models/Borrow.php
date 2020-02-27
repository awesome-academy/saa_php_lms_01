<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Book;
use App\Models\BorrowBook;
use App\Models\User;
class Borrow extends Model
{
    //
    public function bookBorrow(){
        return $this->hasMany(BorrowBook::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function books(){
        return $this->belongsToMany(Book::class);
    }
}
