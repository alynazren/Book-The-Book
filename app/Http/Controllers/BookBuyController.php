<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

// Adding User class
use App\User;

// Adding BookSell class
use App\BookSell;

// Adding BookCategory class
use App\BookCategories;

// Adding BookSubjects class
use App\BookSubjects;

// Adding OrderStatus class
use App\OrderStatus;

use App\Mailers\AppMailer;

class BookBuyController extends Controller
{
    //
    // Users to see list of all the book posted
    public function allBookSell()
    {
        $book_sells = BookSell::paginate(10);
        $book_categories = BookCategories::all();
        $book_subjects = BookSubjects::all();
        $order_statuses = OrderStatus::all();

        return view('BuyBooks.all_book', compact('book_sells', 'book_categories', 'book_subjects', 'order_statuses'));
    }

    
}
