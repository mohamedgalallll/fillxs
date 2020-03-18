<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $categories= Category::all();
        return view('DashBoardAdmin.Categories',compact('categories'));
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('DashBoardAdmin.AddCategory');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $data =   $request->validate([
            'title_in_ar' => 'required',
            'title_in_en' => 'required',
            'icon' => 'sometimes|nullable|string'
        ]);

      Category::create($data);
        return redirect('/allcategories')->with('Add', 'Category was Add Category !!');

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
        $categories = Category::findOrFail($id);
        return view('DashBoardAdmin.EditCategory',compact('categories'));
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
        $categories = Category::findOrFail($id);
       $data = $request->validate([
            'title_in_ar' => 'sometimes|nullable|string',
            'title_in_en' =>'sometimes|nullable|string',
            'icon' => 'sometimes|nullable|string'

        ]);


        $categories->update($data);
        return redirect('/allcategories')->with('update', 'Category was Updated !!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category=Category::findOrFail($id);
        $category->delete();
        return redirect('/allcategories')->with('status', 'Category was Deleted !!');

    }

    public function chooseAds()
    {
        $categories = Category::all();
        return view('ads.choseCategory', compact('categories'));
    }


}
