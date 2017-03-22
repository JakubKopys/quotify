@extends('layouts/app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <table class="table borderless">
                    <thead>
                    <tr>
                        <th>Category</th>
                        <th>Quotes count</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($categories as $category)
                        <tr>
                            <td><a href="{{URL::action('CategoriesController@show', [$category->slug])}}">{{$category->name}}</a></td>
                            <td>{{$category->quotes()->count()}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection