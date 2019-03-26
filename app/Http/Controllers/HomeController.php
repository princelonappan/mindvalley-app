<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Tag;
use App\Models\Article;
use App\Models\ArticleTag;
use View;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
//        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        $tags = Tag::all();
        $articles = Article::all();
        return View::make('welcome')->with(array('categories' => $categories, 
            'tags' => $tags, 'articles' => $articles));
    }
    
    public function show()
    {
        $categories = Category::all();
        $tags = Tag::all();
        $article = Article::find(99);
        return View::make('show')->with(array('categories' => $categories, 
            'tags' => $tags, 'article' => $article));
    }
    
    
    public function category()
    {
        $categories = Category::all();
        $tags = Tag::all();
        $selected_category = Category::find(1);
        $articles = Article::where('category_id', 1)->get();
        return View::make('category')->with(array('categories' => $categories, 
            'tags' => $tags, 'articles' => $articles, 'selected_category'
            => $selected_category));
    }
    
    public function tag()
    {
        $tag = 2;
        $categories = Category::all();
        $tags = Tag::all();
        $selected_tag = Tag::find($tag);
        $articles = ArticleTag::where('tag_id', $tag)->get();
        return View::make('tag')->with(array('categories' => $categories, 
            'tags' => $tags, 'articles' => $articles, 'selected_tag'
            => $selected_tag));
    }
    
    
    public function admin()
    {
        return view('admin');
    }

}
