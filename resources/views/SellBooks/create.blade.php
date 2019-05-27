@extends('layouts.app')

@section('title', 'Open Ticket')

@section('content')
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <!-- <div class="panel-heading">Book Details</div> -->

                <div class="panel-body">
                    @include('includes.flash')

                    <form class="form-horizontal" role="form" method="POST" enctype = "multipart/form-data" action="{{ url('/new_bookSell') }}">
                        {!! csrf_field() !!}

                        <!-- Book Category -->
                        <div class="form-group{{ $errors->has('category') ? ' has-error' : '' }}">
                            <label for="category" class="col-md-4 control-label">Category</label>

                            <div class="col-md-6">
                                <select id="category" type="category" class="form-control" name="category">
                                    <option value="">Select Category</option>
                                    @foreach ($book_categories as $category)
                        <option value="{{ $category->id }}">{{ $category->category }}</option>
                                    @endforeach
                                </select>

                                @if ($errors->has('category'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('category') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <!-- Book Subject -->
                        <div class="form-group{{ $errors->has('subject') ? ' has-error' : '' }}">
                            <label for="subject" class="col-md-4 control-label">Subject</label>

                            <div class="col-md-6">
                                <select id="subject" type="subject" class="form-control" name="subject">
                                    <option value="">Select Subject</option>
                                    @foreach ($book_subjects as $subject)
                        <option value="{{ $subject->id }}">{{ $subject->subject }}</option>
                                    @endforeach
                                </select>

                                @if ($errors->has('subject'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('subject') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <!-- Book Title -->
                        <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                            <label for="title" class="col-md-4 control-label">Title</label>

                            <div class="col-md-6">
                                <input id="title" type="text" class="form-control" name="title" value="{{ old('title') }}">

                                @if ($errors->has('title'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <!-- Book Author -->
                        <div class="form-group{{ $errors->has('author') ? ' has-error' : '' }}">
                            <label for="author" class="col-md-4 control-label">Author</label>

                            <div class="col-md-6">
                                <input id="author" type="text" class="form-control" name="author" value="{{ old('author') }}">

                                @if ($errors->has('author'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('author') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <!-- Book Publisher -->
                        <div class="form-group{{ $errors->has('publisher') ? ' has-error' : '' }}">
                            <label for="publisher" class="col-md-4 control-label">Publisher</label>

                            <div class="col-md-6">
                                <input id="publisher" type="text" class="form-control" name="publisher" value="{{ old('publisher') }}">

                                @if ($errors->has('publisher'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('publisher') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <!-- Book Year Published -->
                        <div class="form-group{{ $errors->has('year') ? ' has-error' : '' }}">
                            <label for="year" class="col-md-4 control-label">Year Published</label>

                            <div class="col-md-6">
                                <input id="year" type="text" class="form-control" name="year" value="{{ old('year') }}">

                                @if ($errors->has('year'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('year') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <!-- Book ISBN -->
                        <div class="form-group{{ $errors->has('isbn') ? ' has-error' : '' }}">
                            <label for="isbn" class="col-md-4 control-label">ISBN</label>

                            <div class="col-md-6">
                                <input id="isbn" type="text" class="form-control" name="isbn" value="{{ old('isbn') }}">

                                @if ($errors->has('isbn'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('isbn') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <!-- Book Selling Price -->
                        <div class="form-group{{ $errors->has('price') ? ' has-error' : '' }}">
                            <label for="price" class="col-md-4 control-label">Selling Price (RM)</label>

                            <div class="col-md-6">
                                <input id="price" type="text" class="form-control" name="price" value="{{ old('price') }}">

                                @if ($errors->has('price'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('price') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                         <!-- Book Cover Page -->
                         <div class="form-group{{ $errors->has('coverPage') ? ' has-error' : '' }}">
                            <label for="coverPage" class="col-md-4 control-label">Book Photo</label>

                            <div class="col-md-6">
                            <input id = "coverPage" type="file" name="coverPage" value="{{ old('coverPage') }}">
                            @if ($errors->has('coverPage'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('coverPage') }}</strong>
                                    </span>
                                @endif
                            </div>
                            
                            <br><br>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-ticket"></i> SELL BOOK
                                </button>
                            </div>
                        </div>

                        
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection