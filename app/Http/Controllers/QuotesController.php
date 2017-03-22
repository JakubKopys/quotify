<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use User;
use Quote;
use Auth;
use Category;
use Author;

class QuotesController extends Controller
{
    public function show(Quote $quote)
    {
        $categories = Category::all();
        $category = $quote->category;
        $quotes = $quote->author->quotes()->orderBy('created_at', 'desc')->take(4)->get();
        return view('quotes/show', compact('quote', 'categories', 'category', 'quotes'));
//        return response()->json(compact('quotes'));
    }

    public function new()
    {
        $categories = Category::all();
        $authors = Author::all();
        return view('quotes/new', ['categories' => $categories, 'authors' => $authors]);
    }

    public function create(Request $request)
    {
        $date = $request['date'] ? Carbon::parse($request['date'])->format('j M Y') : null;
        Auth::user()->quotes()->create([
            'content' => $request['content'],
            'category_id' => $request['category'],
            'author_id' => $request['author_id'],
            'date' => $date
        ]);

        return redirect()->to('home');
    }

    public function edit(Quote $quote)
    {
        return view('quotes.edit', compact('quote'));
    }

    public function update(Request $request, Quote $quote)
    {

        $date = $request['date'] ? Carbon::parse($request['date'])->format('j M Y') : null;
        $quote->update([
            'content' => $request['content'],
            'author' => $request['author'],
            'date' => $date
        ]);

        return back();
    }
}
