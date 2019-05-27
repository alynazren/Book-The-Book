<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BookSell extends Model
{
    // This tells Laravel that the columns specified can be mass assigned.
    protected $fillable = [
        'user_id', 'category_id', 'subject_id', 'title', 'author', 'publisher', 'year', 'isbn', 'coverPage', 'price', 'status_id', 'bookSell_id'
    ];

    // Creating relationship - BookSell belongs to a User
    public function User()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // Creating relationship - BookSell belongs to a BookCategories
    public function bookCategories()
    {
        return $this->belongsTo(BookCategories::class,'category_id');
        
    }

   
    // Creating relationship - BookSell belongs to a BookSubjects
    public function bookSubjects()
    {
        return $this->belongsTo(BookSubjects::class,'subject_id');
    }

    // Creating relationship - BookSell belongs to a OrderStatus
    public function orderStatus()
    {
        return $this->belongsTo(OrderStatus::class, 'status_id');
    }

    

}
