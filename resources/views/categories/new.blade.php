@extends('layouts/app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                {!! Form::open(['url' => '/categories', 'method' => 'post', 'class' => 'form']) !!}
                <div class="form-group">
                    <input name="name" class="form-control" placeholder="Category name">
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary" id="add-quote">Add Category</button>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection