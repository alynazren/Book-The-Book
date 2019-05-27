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

class BookSellsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    //Show the form for posting a new book for sale
    public function create()
    {
         // Getting all the BookCategory, BookSubjects, OrderStatus created and pass them along to a view file
        $book_categories = BookCategories::all();
        $book_subjects = BookSubjects::all();
        $order_statuses = OrderStatus::all();
        
        return view('SellBooks.create', compact('book_categories', 'book_subjects','order_statuses'));
    }

    // Handling the actual saving of the BookSell to the database
    // Accepting arguments - $request variable of type Request
    // Accepting arguments AppMailer 
    public function store(Request $request, AppMailer $mailer)
    {
        // form validations rules that must be met before moving forward 
        $this->validate($request, [
                'category'  => 'required',
                'subject'  => 'required',
                'title'     => 'required',
                'author'  => 'required',
                'publisher'  => 'required',
                'year'  => 'required',
                'isbn'  => 'required',
                'coverPage'  => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'price'  => 'required',
            ]);

            $bookSell = new BookSell([
                'user_id'   => Auth::user()->id,
                'category_id'  => $request->input('category'),
                'subject_id'  => $request->input('subject'),
                'title'     => $request->input('title'),
                'author'  => $request->input('author'),
                'publisher'   => $request->input('publisher'),
                'year'   => $request->input('year'),
                'isbn'   => $request->input('isbn'),
                // 'coverPage'   => $request->file('coverPage'), 
                'price'   => $request->input('price'),
                'bookSell_id' => strtoupper(str_random(10)),
                'status_id'    => 1,

                
        ]);

        if ($request->hasfile('coverPage')) {
            $file = $request->file('coverPage');
            $extension = $file->getClientOriginalExtension(); // getting coverPage extension
            $filename = time() . '.' . $extension;
            $file->move('uploads/appsetting/', $filename);
            $bookSell->coverPage = $filename;
        } 
        
        else {
            return $request;
            $bookSell->coverPage = '';
        }

            $bookSell->save();

            // $mailer->sendBookInformation(Auth::user(), $bookSell);

            // return redirect()->back()->with("status_id", "You book (#$bookSell->bookSell_id) is posted to be sold.");
            return $this->userBookSell();

    }


    // Users to see list of all the book they have posted
    public function userBookSell()
    {
        $book_sells = BookSell::where('user_id', Auth::user()->id)->paginate(10);
        $book_categories = BookCategories::all();
        $book_subjects = BookSubjects::all();
        $order_statuses = OrderStatus::all();

        return view('SellBooks.user_bookSell', compact('book_sells', 'book_categories', 'book_subjects', 'order_statuses'));
    }

    // Users to be able to acces a particular book posted
    public function show($bookSell_id)
{
    $bookSell = BookSell::where('bookSell_id', $bookSell_id)->firstOrFail();
    $category = $bookSell->category;
    $subject = $bookSell->subject;
    $status = $bookSell->status;

    return view('SellBooks.show', compact('bookSell', 'category', 'subject', 'status'));
}

    //Users to be able to edit a particular book
    public function edit($id) {
        $bookSell = BookSell::find($id);
        $category = $bookSell->category;
        $subject = $bookSell->subject;
        $status = $bookSell->status;

        return view('SellBooks.edit', compact('bookSell', 'category', 'subject', 'status'));
    }

    // Users update edited book
    public function update(Request $request, $id) {
        // form validations rules that must be met before moving forward 
        $this->validate($request, [
            'category'  => 'required',
            'subject'  => 'required',
            'title'     => 'required',
            'author'  => 'required',
            'publisher'  => 'required',
            'year'  => 'required',
            'isbn'  => 'required',
            'coverPage'  => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'price'  => 'required',
        ]);

        $bookSell = BookSell::find($id)([
            'user_id'   => Auth::user()->id,
            'category_id'  => $request->input('category'),
            'subject_id'  => $request->input('subject'),
            'title'     => $request->input('title'),
            'author'  => $request->input('author'),
            'publisher'   => $request->input('publisher'),
            'year'   => $request->input('year'),
            'isbn'   => $request->input('isbn'),
            // 'coverPage'   => $request->file('coverPage'), 
            'price'   => $request->input('price'),
            'bookSell_id' => strtoupper(str_random(10)),
            'status_id'    => 1,

            
    ]);

    if ($request->hasfile('coverPage')) {
        $file = $request->file('coverPage');
        $extension = $file->getClientOriginalExtension(); // getting coverPage extension
        $filename = time() . '.' . $extension;
        $file->move('uploads/appsetting/', $filename);
        $bookSell->coverPage = $filename;
    } 
    
    else {
        return $request;
        $bookSell->coverPage = '';
    }

        $bookSell->save();

        // $mailer->sendBookInformation(Auth::user(), $bookSell);

        // return redirect()->back()->with("status_id", "You book (#$bookSell->bookSell_id) is posted to be sold.");
        return $this->userBookSell()->with("success", "Book Updated!");;
    }


    // Users to be able to delete a particular book
    public function destroy(Request $request){
        $id = $request-> input('id');
        $del = BookSell::find($id);
        $del->delete();
        
        return $this->userBookSell();
    }

}
