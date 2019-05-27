@extends('layouts.app')

@section('title', 'All Books')

@section('content')

    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fa fa-ticket">All Books</i>
                </div>

                <div class="panel-body">
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
                                    <th>Seller</th>
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
                                    @foreach ($book_categories as $category)
                                        @if ($category->id === $book->category_id)
                                            {{ $category->category }}
                                        @endif
                                    @endforeach
                                    </td>
                                    <td>
                                    @foreach ($book_subjects as $subject)
                                        @if ($subject->id === $book->subject_id)
                                            {{ $subject->subject }}
                                        @endif
                                    @endforeach
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
                                    @if ($book->orderStatus->status === "Posted")
                                        <span class="label label-success">Available</span>
                                    @elseif ($book->status === "Ordered")
                                        <span class="label label-danger">{{ $book->orderStatus->status }}</span>
                                    @else
                                        <span class="label label-danger">{{ $book->orderStatus->status }}</span>
                                    @endif
                                    </td>
                                    <td>{{ $book->updated_at }}</td>
                                    <td>                                    
                                        <a href="{{ url('profile/'. $book->user_id) }}">
                                        {{ $book->User->name }}                               
                                    
                                    </td>
                                    <td>
                                        <!-- View book details button  -->
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

                        {{ $book_sells->render() }}
                   
                </div>
            </div>
        </div>
    </div>
@endsection