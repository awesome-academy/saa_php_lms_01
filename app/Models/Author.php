<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\BookAuthor;
class Author extends Model
{
    //
    public function bookAuthors(){
        return $this->hasMany(BookAuthor::class);
    }
}
