@extends('layouts.app')

@section('content')
    <div class="container home">
        @include('categories/category_list', ['categories'=>$categories, 'id'=>$category->id])
        <div class="row popular">
            <h4 class="header"><strong>{{$category->name}}</strong></h4>
            @foreach($quotes as $quote)
                <div class="col-md-4">
                    @include('quotes/quote', $quote)
                </div>
            @endforeach
        </div>
    </div>
@endsection
