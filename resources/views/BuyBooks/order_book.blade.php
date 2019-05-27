@extends('layouts.app')

@section('title', 'Order')

@section('content')
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
            

               
                <div class="panel-body">
                    @include('includes.flash')
                    
                    <h3>Book Order Form</h3>

                    <form action="{{ url('/order/'. $book_sells->bookSell_id) }}" method="post" enctype="text/plain">
                    
                   
                    <input type="hidden" name="book" value="{{ $book_sells->bookSell_id}}">
                    <input type="hidden" name="buyer" value="{{ Auth::user()->id }}">

                    Subject:<br>
                    <input type="text" name="Subject"value="{{ $book_sells->bookSubjects->subject }}" disabled><br>
                    Title:<br>
                    <input type="text" name="Title" value="{{ $book_sells->title }}" disabled><br>
                    Author:<br>
                    <input type="text" name="Author" value="{{ $book_sells->author }}" disabled><br>
                    Year:<br>
                    <input type="text" name="Year" value="{{ $book_sells->year }}" disabled><br>
                    Price:<br>
                    <input type="text" name="Price" value="{{ $book_sells->price }}" disabled><br>
                    
                    <input type="submit" value="Confirm Order">
                    <input type="reset" value="Cancel">
                    
                    </form>
                            
                    
                </div>
            </div>
        </div>
    </div>
@endsection