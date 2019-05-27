@extends('layouts.app')

@section('title', 'User Profile')

@section('content')
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
            

                <div class="panel-body">
                    @include('includes.flash')

                    
                            

                    <div class="bookSell-info">
                    <table class ="table">

                            <tr>
                            <th> NAME </th>
                            <th> :   {{ $user->name }} </th>
                            </tr>

                            <tr>
                            <th> EMAIL </th>
                            <th> :   {{ $user->email }} </th>
                            </tr>

                            <tr>
                            <th> CONTACT NO </th>
                            <th> :   {{ $user->contactNo }} </th>
                            </tr>

                            <tr>
                            <th> BOOK TO SELL </th>
                            <th> : <div >
                                @if ($book_sells->isEmpty())
                                    <p>Seller did not posted any books.</p>
                                @else
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <!-- <th>Book ID </th> -->
                                                <th>Category</th>
                                                <th>Subject</th>
                                                <th>Title</th>
                                                <th>Author</th>
                                                <!-- <th>Publisher</th> -->
                                                <th>Published Year</th>
                                                <!-- <th>ISBN</th> -->
                                                <th>Price</th>
                                                <th>Status</th>
                                                <th>Last Updated</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($book_sells as $book)
                                            <tr>
                                                <!-- <td>
                                                <a href="{{ url('bookSell/'. $book->bookSell_id) }}">
                                                        #{{ $book->bookSell_id }}
                                                    </a>
                                                </td> -->
                                                <td>
                                                
                                                {{ $book->bookCategories->category }}
                                                </td>
                                                <td>
                                                <!--  -->
                                                {{ $book->bookSubjects->subject }}
                                                </td>
                                                <td>
                                                    {{ $book->title }}
                                                </td>
                                                <td>
                                                    {{ $book->author }}
                                                </td>
                                                <!-- <td>
                                                    {{ $book->publisher }}
                                                </td> -->
                                                <td>
                                                    {{ $book->year }}
                                                </td>
                                                <!-- <td>
                                                    {{ $book->isbn }}
                                                </td> -->
                                                <td>
                                                    {{ $book->price }}
                                                </td>
                                                <td>
                                                @if ($book->status === "Posted")
                                                    <span class="label label-success">Available</span>
                                                @elseif ($book->status === "Ordered")
                                                    <span class="label label-danger">{{ $book->orderStatus->status }}</span>
                                                @else
                                                    <span class="label label-danger">{{ $book->orderStatus->status }}</span>
                                                @endif
                                                </td>
                                                <td>{{ $book->updated_at }}</td>
                                                <td>
                                                    <!-- View Button -->
                                                    <a class="button_a mybutton" href="{{ url('bookSell/'. $book->bookSell_id) }}" style="text-decoration:none;">
                                                        View 
                                                    </a>

                                                    <!-- Buy Button -->
                                                    <a class="button_a mybutton" href="{{ url('order_book/'. $book->id) }}" style="text-decoration:none;">Order</a>
                                                        
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>

                                    
                                @endif
                            </div>
                            
                            </th><th></th>
                            </tr>

                        </table>
                            
                        
                    </div>

                    <hr>

                    <form action="mailto:{{ $user->email }}?subject=BooKTheBooK" method="post" enctype="text/plain">
                   
                    Subject:<br>
                    <input type="text" name="Subject"value="{{ $book->bookSubjects->subject }}"><br>
                    Title:<br>
                    <input type="text" name="Title" value="{{ $book->title }}"><br>
                    Author:<br>
                    <input type="text" name="Author" value="{{ $book->author }}"><br>
                    Year:<br>
                    <input type="text" name="Year" value="{{ $book->year }}"><br>
                    Price:<br>
                    <input type="text" name="Price" value="{{ $book->price }}"><br>

                    <input type="submit" value="Order">
                    <input type="reset" value="Cancel">
                    
                    </form>

                    
                </div>
            </div>
        </div>
    </div>
    <script>
        function order_book(id) {
            var mail = prompt("Please enter your email to proceed the order:");
            if (mail == null || mail == "") {
                alert("You cancelled the prompt.");
            } else {
                alert("Thank you " + mail + ".\nYour order has been sent to seller");
            }
        }
    </script>
@endsection