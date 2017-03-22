{{ Form::open([ 'method'  => 'post', 'action' => [ 'LikesController@create', $quote->id ], 'class' => 'like-form', 'data-quote-id'=>$quote->id]) }}
<button type="submit" class="like-link btn-link" data-quote-id="{{$quote->id}}">
    <i class="fa fa-star-o fa-lg" aria-hidden="true"></i>
</button>
{{$count}}
{{ Form::close() }}