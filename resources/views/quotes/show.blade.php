@extends('layouts/app')

@section('content')
    <div class="container show-quote">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="row quote-cat-list">
                    <h4>Categories:</h4>
                    <div class="col-md-12 categories">
                        <ul class="list-inline">
                            @foreach($categories as $cat)
                                <li>
                                    <a href="{{URL::action('CategoriesController@show', [$cat->slug])}}" class={{$category->id==$cat->id ? 'active' : 'inactive'}}>
                                        {{$cat->name}}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <blockquote>
                    <p>{{$quote->content}}</p>
                    @if ($quote->author)
                        <footer>
                            <a href="{{URL::action('AuthorsController@show', [$quote->author->id])}}">{{$quote->author->name}}</a>
                            @if ($quote->date)
                                {{$quote->date}}
                            @endif
                            <div class="likes pull-right" data-quote-id={{$quote->id}}>
                                @unless (Auth::user()->already_likes($quote))
                                    @include('likes/like', [$quote, 'count' => $quote->likes_count])
                                @else
                                    @include('likes/unlike', [$quote, 'count' => $quote->likes_count])
                                @endunless
                            </div>
                        </footer>
                    @endif
                </blockquote>
            </div>
        </div>
        <div class="row">
            <div class="col-md-10 col-md-offset-2">
                <h4>More quotes by {{$quote->author->name}}:</h4>
                @foreach($quotes as $q)
                <div class="col-md-5">
                    @include('quotes/quote', ['quote'=>$q])
                </div>
                @endforeach
            </div>
        </div>
        <div class="back">
            <a href="/home">Home</a>
        </div>
    </div>

@endsection