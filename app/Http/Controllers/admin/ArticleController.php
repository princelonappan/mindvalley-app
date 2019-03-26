<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\Category;
use App\Models\Tag;
use App\Models\Article;
use App\Models\ArticleTag;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use View;
use Auth;

class ArticleController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $articles = Article::all();

        // load the view and pass the categories
        return View::make('admin.article.index')
                        ->with('articles', $articles);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        $category = [];
        foreach ($categories as $value)
        {
            $category[$value->id] = $value->name;
        }
        return View::make('admin.article.create')
                        ->with(array('categories' => $category, 'tags' => $tags));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $rules = array(
            'name' => 'required',
            'description' => 'required',
            'category' => 'required',
            'tag' => 'required'
        );
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails())
        {
            return Redirect::to('/admin/article/create')
                            ->withErrors($validator)
                            ->withInput(Input::except('name'));
        }
        else
        {
            $description = Input::get('description');
            $dom = new \domdocument();
            $dom->loadHtml($description, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
            $images = $dom->getelementsbytagname('img');
            //loop over img elements, decode their base64 src and save them to public folder,
            //and then replace base64 src with stored image URL.
            foreach ($images as $k => $img)
            {
                $data = $img->getattribute('src');

                list($type, $data) = explode(';', $data);
                list(, $data) = explode(',', $data);

                $data = base64_decode($data);
                $image_name = time() . $k . '.png';
                $path = public_path() . '/uploads/' . $image_name;
                file_put_contents($path, $data);

                $img->removeattribute('src');
                $image_public_url = url('/').'/uploads/'.$image_name;
                $img->setattribute('src', $image_public_url);
            }
            $id = Auth::user()->id;
            $detail = $dom->savehtml();
            $article = new Article();
            $article->title = Input::get('name');
            $article->description = $detail;
            $article->category_id = Input::get('category');
            $article->status = 1;
            $article->user_id = $id;
            if ($article->save())
            {
                $tags = Input::get('tag');
                foreach ($tags as $tag)
                {
                    $article_tag = new ArticleTag();
                    $article_tag->article_id = $article->id;
                    $article_tag->tag_id = $tag;
                    $article_tag->save();
                }
            }
            // redirect
            Session::flash('message', 'Successfully created Article!');
            return Redirect::to('/admin/article');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $article = Article::find($id);

        // load the view and pass the categories
        return View::make('admin.article.show')
                        ->with('article', $article);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $article = Article::find($id);
        $categories = Category::all();
        $all_tags = Tag::all();
        $category = [];
        $tag = [];
        
        foreach ($categories as $value)
        {
            $category[$value->id] = $value->name;
        }
        $i = 0;
        foreach($article->articleTags as $tags) 
        {
            $tag[] = $tags->tag_id;
            $i++;
        }
        
        // load the view and pass the categories
        return View::make('admin.article.edit')
                        ->with(array('categories' => $category, 
                            'tags' => $all_tags, 'article'=> $article, 'selected_tag' => $tag));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $rules = array(
            'title' => 'required',
            'description' => 'required',
            'category' => 'required',
            'tag' => 'required'
        );
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails())
        {
            return Redirect::to('/admin/article/' . $id . '/edit')
                            ->withErrors($validator)
                            ->withInput(Input::except('name'));
        }
        else
        {
            $description = Input::get('description');
            $dom = new \domdocument();
            $dom->loadHtml($description, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
            $images = $dom->getelementsbytagname('img');
            //loop over img elements, decode their base64 src and save them to public folder,
            //and then replace base64 src with stored image URL.
            foreach ($images as $k => $img)
            {
                $data = $img->getattribute('src');
                if (filter_var($data, FILTER_VALIDATE_URL))
                {
                    //Nothing
                }
                else
                {
                    list($type, $data) = explode(';', $data);
                    list(, $data) = explode(',', $data);

                    $data = base64_decode($data);
                    $image_name = time() . $k . '.png';
                    $path = public_path() . '/uploads/' . $image_name;
                    file_put_contents($path, $data);

                    $img->removeattribute('src');
                    $image_public_url = url('/') . '/uploads/' . $image_name;
                    $img->setattribute('src', $image_public_url);
                }
            }

            $detail = $dom->savehtml();
            $article = Article::find($id);
            $article->title = Input::get('title');
            $article->description = $detail;
            $article->category_id = Input::get('category');
            $article->status = 1;
            if ($article->save())
            {
                $tags = Input::get('tag');
                foreach ($tags as $tag)
                {
                    $article_tag = ArticleTag::where('tag_id', $tag)->first();
                    if (empty($article_tag))
                    {
                        $article_tag = new ArticleTag();
                        $article_tag->article_id = $article->id;
                        $article_tag->tag_id = $tag;
                        $article_tag->save();
                    }
                }
            }
            // redirect
            Session::flash('message', 'Successfully updated Article!');
            return Redirect::to('/admin/article');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // delete
        $article = Article::find($id);
        $article->articleTags()->delete();
        $article->delete();
        // redirect
        Session::flash('message', 'Successfully deleted the Article!');
        return Redirect::to('/admin/article');
    }

}
