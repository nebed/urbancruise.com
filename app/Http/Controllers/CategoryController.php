<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Category;
use App\Post;
use Session;

class CategoryController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //display a View of all categories with  form for new category
        $categories=Category::all();
        return view('categories.index')->withCategories($categories);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //save a new category
        //redirect to index
        $this->validate($request, array(
            'name'=>'required|max:100'
        ));
        $category = new Category;

        $category->name = $request->name;
        $category->save();
        Session::flash('success', 'New Category has been created');
        return redirect()->route('categories.index');
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
        //
    }

    public function storeFeatured(Request $request)
    {
        $setalltonone = \DB::table('categories')->update(array('featured' => false));
        $categoryids = $request->featured;
        foreach($categoryids as $categoryid)
        {
            $category = Category::find($categoryid);
            $category->featured = true;
            $category->save();
        }
        Session::flash('success', 'The featured catgeories have been stored');
        return redirect()->route('categories.index');
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::find($id);
        Post::whereCategoryId($id)->update(['category_id' => 8]);
        $category->delete();

        Session::flash('success', 'The category was successfully deleted.');

        return redirect()->route('categories.index');    }
}
