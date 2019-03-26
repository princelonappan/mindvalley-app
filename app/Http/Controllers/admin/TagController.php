<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\Tag;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use View;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tags = Tag::all();
        // load the view and pass the categories
        return View::make('admin.tag.index')
            ->with('tags', $tags);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('admin.tag.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       // validate
        $rules = array(
            'name'       => 'required'
        );
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails()) {
            return Redirect::to('/admin/tag/create')
                ->withErrors($validator)
                ->withInput(Input::except('name'));
        } else {
            $name = Input::get('name');
            // store
            $tags = Tag::where('name', $name)->first();
            if (empty($tags)) 
            {
                $tag = new Tag();
                $tag->name = $name;
                $tag->save();
                            // redirect
                Session::flash('message', 'Successfully created Tag!');
                return Redirect::to('/admin/tag');
            } 
            else
            {
                Session::flash('message', 'Duplicate Tag Name');
                return Redirect::to('/admin/tag/create');
            }
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // get the tag
        $tag = Tag::find($id);

        // show the edit form and pass the tag
        return View::make('admin.tag.edit')
                        ->with('tag', $tag);
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
        // validate
        $rules = array(
            'name' => 'required'
        );
        $validator = Validator::make(Input::all(), $rules);

        // process the login
        if ($validator->fails())
        {
            return Redirect::to('/admin/tag/' . $id . '/edit')
                            ->withErrors($validator)
                            ->withInput(Input::except('name'));
        }
        else
        {
            $name = Input::get('name');
            // update
            $taggs = Tag::where([
                        ['name', '=', $name],
                        ['id', '!=', $id]
                    ])->get();
            if ($taggs->count() == 0)
            {
                $tag = Tag::find($id);
                $tag->name = $name;
                $tag->save();

                // redirect
                Session::flash('message', 'Successfully updated Tag!');
                return Redirect::to('/admin/tag');
            }
            else
            {
                Session::flash('message', 'Duplicate Tag Name');
                return Redirect::to('/admin/tag/' . $id . '/edit');
            }
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
        $tag = Tag::find($id);
        $tag->delete();

        // redirect
        Session::flash('message', 'Successfully deleted the Tag!');
        return Redirect::to('/admin/tag');
    }
}
