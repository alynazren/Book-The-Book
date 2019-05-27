<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BookCategories extends Model
{
    protected $fillable = ['category'];

    // Creating relationship - BookCategories can have many BookSell
    public function bookSellCategory()
    {
        return $this->hasMany(BookSell::class);
    }
}
