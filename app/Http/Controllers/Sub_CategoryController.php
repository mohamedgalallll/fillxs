<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Sub_Category;

class Sub_CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Sub_Categories = Sub_Category::all();
        return view('DashBoardAdmin.SubCategories', compact('Sub_Categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $Category=Category::all();
        return view('DashBoardAdmin.AddSubCategory',compact('Category'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title_in_ar' => 'required',
            'title_in_en' => 'required',
            'cat_id' => 'required|integer'
        ]);
        $sub_categor = new Sub_Category();
        $sub_categor->title_in_ar=$request->title_in_ar;
        $sub_categor->title_in_en=$request->title_in_en;
        $sub_categor->cat_id=$request->cat_id;
        
        $sub_categor->save();
        return redirect('/allSubcategories')->with('Add', 'Sub Category was Added'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $categories = Category::find($id);
        $sub_category= Sub_Category::where('cat_id',$categories->id)->get();
        return view('DashBoardAdmin.Show',compact('sub_category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $Sub_Category = Sub_Category::findOrFail($id);
        return view('DashBoardAdmin.EditSubCategory', compact('Sub_Category'));

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
        $request->validate([
            'title_in_ar' => 'required',
            'title_in_en' => 'required',
        ]);
        $Sub_Category = Sub_Category::findOrFail($id);
        $Sub_Category->title_in_ar = $request->title_in_ar;
        $Sub_Category->title_in_en = $request->title_in_en;
        $Sub_Category->save();
        return redirect('/DashBoardAdmin.SubCategories')->with('update', 'Sub_Category was Updated !!');;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Subcategory = Sub_Category::findOrFail($id);
        $Subcategory->delete();
        return redirect('/DashBoardAdmin.SubCategories')->with('status', 'Sub Category was Deleted !!');
    }
    public function chooseSub($id)
    {
        $categories = Category::find($id);
        $sub_category = Sub_Category::where('cat_id', $categories->id)->get();
        return view('ads.chooseSub', compact('sub_category'));
    }
}
