<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Quote;
use Category;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $quotes = Quote::orderBy('likes_count', 'desc')->paginate(9);
        $latest = Quote::orderBy('created_at', 'desc')->take(3)->get();
        $categories = Category::all();
        return view('home', ['quotes' => $quotes, 'categories' => $categories, 'latest' => $latest]);
    }
}
