<?php

namespace App\Http\Controllers;

// Adding User class
use App\User;

// Adding BookSell class
use App\BookSell;

use App\BookOrder;

// Adding BookCategory class
use App\BookCategories;

// Adding BookSubjects class
use App\BookSubjects;

// Adding OrderStatus class
use App\OrderStatus;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\BookBuyController as BBC;
use App\Http\Controllers\HomeController as HC;
use Illuminate\Http\Request;

class BookOrdersController extends Controller
{
    //
    public function orderBuku($bid){

        // retreive book details from this user
        $book_sells = BookSell::where('id', $bid)->first();        

        return view('BuyBooks.order_book',compact('book_sells') );
    }


    // function of newOrder
    public function newOrder($bid){
        
        $buyid = Auth::user()->id;

        // take book details to copy to book order table
        $book_sells = BookSell::where('bookSell_id', $bid)->first();

        
        // echo "<pre>";
        // print_r($book_sells);
        // echo "</pre>";

        // insert to bookOrder table to create new order
        $bookSell = new BookOrder([
            'user_id'   => $book_sells['user_id'],
            'category_id'  => $book_sells['category_id'],
            'subject_id'  => $book_sells['subject_id'],
            'title'     => $book_sells['title'],
            'author'  => $book_sells['author'],
            'publisher'   => $book_sells['publisher'],
            'year'   => $book_sells['year'],
            'coverPage'   => 'coverpage', 
            'price'   => $book_sells['price'],
            'bookSell_id' => $book_sells['bookSell_id'],
            'status_id' => 2, 
            'buyer_id' => $buyid,
        ]);

        // update table bookSell to change status to ORDERED
        BookSell::where('bookSell_id', $bid)->update(['status_id'=>2]);

        $bookSell->save();

        // return view
        $bbc = new BBC;
        return $bbc->allBookSell();

    }

    // function for seller to approve order
    public function approveOrder($oid){

        // update table bookSell to change status to ORDERED
        BookSell::where('bookSell_id', $oid)->update(['status_id'=>3]);

        // update table bookSell to change status to ORDERED
        BookOrder::where('bookSell_id', $oid)->update(['status_id'=>3]);

        // return view
        $hc = new HC;
        return $hc->index();
    }


}
