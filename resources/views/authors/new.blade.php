@extends('layouts/app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                {!! Form::open(['url' => '/authors', 'method' => 'post', 'class' => 'form']) !!}
                    <div class="form-group">
                        <input name="name" class="form-control" placeholder="Author name">
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary" id="add-quote">Add Author</button>
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection