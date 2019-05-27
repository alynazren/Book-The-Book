<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BookSubjects extends Model
{
    protected $fillable = ['subject'];

    // Creating relationship - BookSubjects can have many BookSell
    public function bookSellSubject()
    {
        return $this->hasMany(BookSell::class);
    }
}
