<?php

namespace App\Http\Controllers;

use App\Ad;
use App\Category;
use App\Sub_Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except('index','search');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $categories= Category::all();
        $Sub_count = Sub_Category::count();
        return view('home', compact('categories','Sub_count'));
    }

    public function search(Request $request)
    {
        $categories= Category::all();
        $subCats= Sub_Category::all();
        $mainCat = $request->MainCat;
        $searchTerm = $request->keywords;
        $ads=Ad::where('status','1')
            ->where('category_id',$mainCat)
            ->where(function ($q) use ($searchTerm) {
                $q->orWhere('title', 'LIKE', "%{$searchTerm}%");
                $q->orWhere('price', 'LIKE', "%{$searchTerm}%");
                $q->orWhere('phone', 'LIKE', "%{$searchTerm}%");
                $q->orWhere('city', 'LIKE', "%{$searchTerm}%");
                $q->orWhere('info', 'LIKE', "%{$searchTerm}%");
                $q->orWhere('info2', 'LIKE', "%{$searchTerm}%");
                $q->orWhere('info3', 'LIKE', "%{$searchTerm}%");
                $q->orWhere('info4', 'LIKE', "%{$searchTerm}%");
                $q->orWhere('desc', 'LIKE', "%{$searchTerm}%");
            })
            ->paginate(1);

        return view('ads.ads',compact('categories','subCats','ads'));
    }
    public function admin()
    {
        return view('DashBoardAdmin.home');
    }


}
