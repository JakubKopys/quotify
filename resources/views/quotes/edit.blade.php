@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                @if (count($errors))
                    <div class="alert alert-danger">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{$error}}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form class="edit_quote" method="POST" action="/quotes/{{$quote->id}}">
                    {{method_field('PATCH')}}
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="content">Quote</label>
                        <textarea type="text" name="content" class="form-control">{{$quote->content}}</textarea>
                    </div>

                    <div class="form-group"> <!-- Date input -->
                        <label for="date">Date</label>
                        <input class="form-control" id="date" name="date" value="{{$quote->date}}" type="text"/>
                    </div>

                    <div class="form-group">
                        <label for="author">Author</label>
                        <input id="author" name="author" class="form-control" value="{{$quote->author}}">
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Update Quote</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
@endsection