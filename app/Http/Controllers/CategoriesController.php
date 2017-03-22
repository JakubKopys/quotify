<?php

namespace App\Http\Controllers;

use Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function show(String $slug)
    {
        $category = Category::findBySlug($slug);
        $categories = Category::all();
        $quotes = $category->quotes;
        return view('categories/show', ['category'=>$category, 'categories'=>$categories, 'quotes'=>$quotes]);
    }
    public function index()
    {
        $categories = Category::all();
        return view('categories/index', compact('categories'));
    }

    public function new()
    {
        return view('categories/new');
    }

    public function create(Request $request)
    {
        Category::create([
            'name' => $request['name']
        ]);
        return redirect()->action('CategoriesController@index');
    }
}
