@extends('layouts/app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                {!! Form::open(['url' => '/quotes', 'method' => 'post', 'class' => 'form']) !!}
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="form-group">
                            <textarea id='content' name="content" class="form-control" placeholder="Your quote..."></textarea>
                        </div>
                        <div class="form-group">
                            <select class="form-control" id="sel1" name="category">
                                <option selected disabled>Choose category</option>
                                @foreach($categories as $category)
                                    <option value={{$category->id}}>{{$category->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <select class="form-control" name="author_id">
                                <option selected disabled>Choose author</option>
                                @foreach($authors as $author)
                                    <option value={{$author->id}}>{{$author->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="panel-footer">
                        <h5>Optional:</h5>

                        <div class="form-group"> <!-- Date input -->
                            <input class="form-control" id="date" name="date" placeholder="MM/DD/YYY" type="text"/>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary" id="add-quote">Add Quote</button>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>

@endsection