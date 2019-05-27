<?php

namespace App\Http\Controllers;

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


use Illuminate\Http\Request;

class UserProfileController extends Controller
{
    //
    public function showProfile($user_id){

        // retreive user details from db
        $user = User::where('id', $user_id)->first();

        // retreive book details from this user
        $book_sells = BookSell::where('user_id', $user_id)->get(); 
        

        return view('profile',compact('user','book_sells') );
    }


}
