<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BookOrder;

use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $book_sells = BookOrder::where('user_id', Auth::user()->id)->where('status_id', 2)->get();

        return view('home', compact('book_sells') );
    }
}
