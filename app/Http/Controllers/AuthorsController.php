<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Author;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Debugbar;

class AuthorsController extends Controller
{
    public function index()
    {
        $authors = Author::all();
        return view('authors/index', compact('authors'));
    }

    public function new()
    {
        if (Auth::user()->can('new', Author::class)) {
            return view('authors/new');
        } else {
            //TODO: display flash message
            return back();
        }
    }

    public function create(Request $request)
    {
        if (Auth::user()->can('create', Author::class)) {
            Author::create([
                'name' => $request['name']
            ]);
            return redirect()->action('AuthorsController@index');
        } else {
            return back();
        }
    }

    public function show(Author $author)
    {
        $quotes = $author->quotes;
        return view('authors/show', ['author'=>$author, 'quotes'=>$quotes]);
    }
}
