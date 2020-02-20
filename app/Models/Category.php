<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\BookCategory;
class Category extends Model
{
    //
    public function bookCategory(){
        return $this->hasMany(BookCategory::class);
    }
}
