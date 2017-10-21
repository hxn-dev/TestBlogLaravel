<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use App\Article;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::with(['categories', 'user'])->get();
        $categories =  Category::all();

        return view('home', ['articles' => $articles, 'categories' => $categories]);
    }

    public function profile()
    {
        return view('auth.profile');
    }
}
