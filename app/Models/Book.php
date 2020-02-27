<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Publisher;
use App\Models\BookCategory;
use App\Models\BookAuthor;
use App\Models\BorrowBook;
use App\Models\Reaction;
use App\Models\Comment;
use App\Models\Borrow;
class Book extends Model
{
    protected $fillable = [
        'description', 
        'title', 
        'thumbnail',
        'publisher_id',
    ];
    //
    public function publisher(){
        return $this->belongsTo(Publisher::class);
    }

    public function bookCategory(){
        return $this->hasMany(BookCategory::class);
    }

    public function bookAuthor(){
        return $this->hasMany(BookAuthor::class);
    }

    public function borrowBook(){
        return $this->hasMany(BorrowBook::class);
    }

    public function reactions(){
        return $this->hasMany(Reaction::class);
    }

    public function comments(){
        return $this->hasMany(Comment::class);
    }

    public function borrows(){
        return $this->belongsToMany(Borrow::class);
    }

    public function categories(){
        return $this->belongsToMany(Category::class);
    }

    public function authors(){
        return $this->belongsToMany(Author::class);
    }
}
