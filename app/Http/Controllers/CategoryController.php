<?php

namespace App\Http\Controllers;

use App\Article;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CategoryController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except('show');
        $this->middleware('isAdmin')->except('show');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();

        return view('category.index', ['categories' => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = new Category();
        return view('category.create', ['category' => $category]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $category = Category::create([
            'name' => $request->get('name'),
            'slug' => str_slug($request->get('slug'))
        ]);

        return Redirect()->route('category.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        // 10 DB Queries
        //$articles = $category->articles()->get();

        // 6 DB Queries
        $articles = Article::with(['categories', 'user'])->whereHas('categories', function($query) use($slug){
            $query->where('categories.slug', '=', $slug);
        })->get();

        if($articles->isEmpty())
            abort(404);

        return view('home', ['articles' => $articles]);
    }

}
