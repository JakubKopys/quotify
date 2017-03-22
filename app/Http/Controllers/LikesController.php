<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Quote;
use Like;
use User;
use Auth;
use Illuminate\Support\Facades\View;

class LikesController extends Controller
{
    public function create(Quote $quote)
    {
        $like = new Like;
        $like->user_id = Auth::user()->id;
        $like->quote_id = $quote->id;

        $like->save();
        return response()->json(['view'=>View::make('likes/unlike', ['quote' => $quote, 'count'=>$quote->likes_count+1])->render()]);
    }

    public function destroy(Quote $quote)
    {
        Like::where([
            ['quote_id','=',$quote->id],
            ['user_id','=',Auth::user()->id]
        ])->first()->delete();

        return response()->json(['view'=>View::make('likes/like', ['quote' => $quote, 'count'=>$quote->likes_count-1])->render()]);
    }
}
