<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderStatus extends Model
{
    protected $fillable = ['status'];

    // Creating relationship - OrderStatus can have many BookSell
    public function bookSellOrder()
    {
        return $this->hasMany(BookSell::class);
    }

}
