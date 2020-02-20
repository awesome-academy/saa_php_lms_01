<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Book;
use App\Models\Category;
class BookCategory extends Model
{
    //
    public function book(){
        return $this->belongsTo(Book::class);
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }
}
