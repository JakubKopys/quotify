<div class="quote">
    <a href="{{URL::action('QuotesController@show', [$quote->id])}}" class="quote-content">
        {{$quote->content}}
    </a>
    <div class="desc">
        <span class="quote-author">
            <a href="{{URL::action('AuthorsController@show', [$quote->author->id])}}">{{$quote->author->name}}</a>
            @if ($quote->date)
                - {{$quote->date}}
            @endif
            <div class="likes" data-quote-id={{$quote->id}}>
                @unless (Auth::user()->already_likes($quote))
                    @include('likes/like', [$quote, 'count' => $quote->likes_count])
                @else
                    @include('likes/unlike', [$quote, 'count' => $quote->likes_count])
                @endunless
            </div>
        </span>
        <span class="pull-right timestamp">Added by: {{$quote->user->name}}</span>
        {{--<span class="pull-right timestamp">{{$quote->created_at->diffForHumans()}}</span>--}}
    </div>
</div>