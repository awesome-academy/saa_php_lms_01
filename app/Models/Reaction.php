<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Book;
use App\Models\User;
class Reaction extends Model
{
    //
    protected $fillable = [
        'user_id', 'book_id', 'emotion'
    ];

    public $timestamps = false; 

    public function book(){
        return $this->belongsTo(Book::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
