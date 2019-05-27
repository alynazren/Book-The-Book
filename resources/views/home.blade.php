@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">My Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                        You are logged in!
                    @endif

                    <a  href="{{ url('my_bookSell') }}" style="text-decoration:none">View My List</a> 
                    <br/>
                    <a  href="{{ url('new_bookSell') }}" style="text-decoration:none">Sell A Book Now!</a>
                    <br/>

                </div>                
            </div><br><br>

            <div class="card">
                <div class="card-header">Notifications</div>

                <div class="card-body">
                   
               
                <div class="panel-body">
                    @if ($book_sells->isEmpty())
                        <p>You have no order.</p>
                    @else
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Book ID </th>
                                    <th>Title</th>
                                    <th>Author</th>
                                    <th>Price</th>                                
                                    <th>Ordered On</th>
                                    <th>Buyer</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($book_sells as $book)
                                <tr>
                                    <td>
                                    <!-- <a href="{{ url('bookSell/'. $book->bookSell_id) }}"> -->
                                            #{{ $book->bookSell_id }}
                                        <!-- </a> -->
                                    </td>
                                    <td>
                                        {{ $book->title }}
                                    </td>
                                    <td>
                                        {{ $book->author }}
                                    </td>
                                    
                                    <td>
                                        {{ $book->price }}
                                    </td>
                                    
                                    <td>{{ $book->created_at }}</td>
                                    <td>{{ $book->Buyer->name }}</td>
                                    <td>       
                                    <button type="submit" class="btn btn-primary" onclick="window.location = ' {{ url('/approve/'. $book->bookSell_id) }}'">Approve</button>
                                    
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                    @endif
                </div>
                
                </div>                
            </div>

        </div>
    </div>
</div>
@endsection
