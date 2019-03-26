<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\Category;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use View;

class CategoryController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();

        // load the view and pass the categories
        return View::make('admin.category.index')
                        ->with('categories', $categories);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.category.create');
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
            'name' => 'required',
            'status' => 'required'
        );
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails())
        {
            return Redirect::to('/admin/category/create')
                            ->withErrors($validator)
                            ->withInput(Input::except('name'));
        }
        else
        {
            $name = Input::get('name');
            // store
            $category = Category::where('name', $name)->first();
            if (empty($category))
            {
                $category = new Category();
                $category->name = $name;
                $category->status = Input::get('status');
                $category->save();
                // redirect
                Session::flash('message', 'Successfully created Category!');
                return Redirect::to('/admin/category');
            }
            else
            {
                Session::flash('message', 'Duplicate Category Name');
                return Redirect::to('/admin/category/create');
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
        // get the category
        $category = Category::find($id);

        // show the edit form and pass the category
        return View::make('admin.category.edit')
                        ->with('category', $category);
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
            'name' => 'required',
            'status' => 'required'
        );
        $validator = Validator::make(Input::all(), $rules);

        // process the login
        if ($validator->fails())
        {
            return Redirect::to('/admin/category/' . $id . '/edit')
                            ->withErrors($validator)
                            ->withInput(Input::except('name'));
        }
        else
        {
            $name = Input::get('name');
            // update
            $categories = Category::where([
                        ['name', '=', $name],
                        ['id', '!=', $id]
                    ])->get();
            if ($categories->count() == 0)
            {
                $category = Category::find($id);
                $category->name = $name;
                $category->status = Input::get('status');
                $category->save();

                // redirect
                Session::flash('message', 'Successfully updated Category!');
                return Redirect::to('/admin/category');
            }
            else
            {
                Session::flash('message', 'Duplicate Category Name');
                return Redirect::to('/admin/category/' . $id . '/edit');
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
        $category = Category::find($id);
        $category->delete();

        // redirect
        Session::flash('message', 'Successfully deleted the Category!');
        return Redirect::to('/admin/category');
    }

}
