{{ Form::open([ 'method'  => 'delete', 'action' => [ 'LikesController@destroy', $quote->id ], 'class' => 'unlike-form', 'data-quote-id'=>$quote->id]) }}
<button type="submit" class="like-link btn-link" data-quote-id="{{$quote->id}}">
    <i class="fa fa-star fa-lg" aria-hidden="true"></i>
</button>
{{$count}}
{{ Form::close() }}