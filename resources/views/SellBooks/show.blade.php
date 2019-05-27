@extends('layouts.app')

@section('title', $bookSell->title)

@section('content')
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <!-- #{{ $bookSell->bookSell_id }} -->
                </div>

                <div class="panel-body">
                    @include('includes.flash')

                    <div class="bookSell-info">
                        <table class ="table">

                        <th>
                        <img height= 250 width= 250 src="{{ asset('uploads/appsetting/' . $bookSell->coverPage) }}" />
                        </th>

                            <tr>
                            <th> BOOK ID </th>
                            <th> : #{{ $bookSell->bookSell_id }}</th>
                            </tr>

                            <tr>
                            <th> CATEGORY </th>
                            <th> : {{ $bookSell->bookCategories->category }} </th>
                            </tr>

                            <tr>
                            <th> SUBJECT </th>
                            <th> : {{ $bookSell->subject_id }} </th>
                            </tr>

                            <tr>
                            <th> TTILE </th>
                            <th> : {{ $bookSell->title }}</th>
                            </tr>

                            <tr>
                            <th> AUTHOR </th>
                            <th> : {{ $bookSell->author }}</th>
                            </tr>

                            <tr>
                            <th> PUBLISHER </th>
                            <th> : {{ $bookSell->publisher }}</th>
                            </tr>

                            <tr>
                            <th> YEAR PUBLISHED </th>
                            <th> : {{ $bookSell->year }}</th>
                            </tr>

                            <tr>
                            <th> ISBN </th>
                            <th> : {{ $bookSell->isbn }} </th>
                            </tr>

                            <tr>
                            <th> PRICE </th>
                            <th> : RM {{ $bookSell->price }}</th>
                            </tr>

                            <tr>
                            <th> POSTED ON </th>
                            <th> : {{ $bookSell->created_at->diffForHumans() }}</th>
                            </tr>

                            <tr>
                            <th> UPDATED ON </th>
                            <th> : {{ $bookSell->updated_at->diffForHumans() }}</th><th></th>
                            </tr>

                        </table>

                        <table class ="buttons">

                            <th><!-- Order Button -->
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary" onclick="order_book( {{ $bookSell->id }} )">Order</button>
                                </div> 
                            </th>

                            <th> <!-- Edit Button -->
                                <div class="form-group">
                                    <button type="submit" class="btn btn-default" onclick="bookSell/edit">Edit</button>
                                    <!-- /bookSell/{{$bookSell->id}}/edit  -->
                                </div>
                            </th>
                                                    

                            <th><!-- Delete Button -->
                                <div class="form-group">
                                    <button type="submit" class="btn btn-danger" onclick="destroy( {{ $bookSell->id }} )">Delete</button>
                                </div> 
                            </th>

                            
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>

    function destroy(id){
        // alert('success');
        var url="{{ url('bookSell/destroy') }}?id=" + id;
        // alert(url);
        window.location.replace(url);
    }

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