@extends('layouts.app')

@section('content')
<div class="container home">
    @include('categories/category_list', ['categories'=>$categories, 'id'=>null])
    <div class="row latest">
        <h4 class="header"><strong>Latest</strong></h4>
        @foreach($latest as $l)
            <div class="col-md-4">
                @include('quotes/quote', ['quote' => $l])
            </div>
        @endforeach
    </div>
    <div class="row popular">
        <h4 class="header"><strong>Popular</strong></h4>
        @foreach($quotes as $quote)
            <div class="col-md-4">
                @include('quotes/quote', $quote)
            </div>
        @endforeach
    </div>
    <div class="row">
        <div class="col-md-6 col-md-offset-4">
            {{ $quotes->links() }}
        </div>
    </div>

</div>
@endsection
