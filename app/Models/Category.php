<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\BookCategory;
use App\Models\Book;
class Category extends Model
{
    //
    public function bookCategory(){
        return $this->hasMany(BookCategory::class);
    }
    
    public function books(){
        return $this->belongsToMany(Book::class);
    }
}
