@extends('layouts/app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <table class="table borderless">
                    <thead>
                    <tr>
                        <th>Author</th>
                        <th>Quotes count</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($authors as $author)
                        <tr>
                            <td><a href="{{URL::action('AuthorsController@show', [$author->id])}}">{{$author->name}}</a></td>
                            <td class="count">{{$author->quotes()->count()}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection