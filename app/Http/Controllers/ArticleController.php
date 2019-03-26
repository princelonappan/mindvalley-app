<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Tag;
use App\Models\Article;
use App\Models\ArticleTag;
use View;

class ArticleController extends Controller
{

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
        return View::make('article.index')->with(array('categories' => $categories, 
            'tags_list' => $tags, 'articles' => $articles));
    }
    
    public function show($id)
    {
        $categories = Category::all();
        $tags = Tag::all();
        $article = Article::find($id);
        if (!empty($article))
        {
            return View::make('article.show')->with(array('categories' => $categories,
                        'tags_list' => $tags, 'article' => $article));
        }
        else
        {
            return abort(404);
        }
    }
    
    public function search(Request $request)
    {
        // Gets the query string from our form submission
        $query = $request->input('search');
        $categories = Category::all();
        $tags = Tag::all();
        if (!empty($query))
        {
            $articles = Article::where('title', 'like', '%' . $query . '%')->get();
        }
        else
        {
            $articles = Article::all();
        }
        return View::make('article.index')->with(array('categories' => $categories,
                    'tags_list' => $tags, 'articles' => $articles));
    }

}
