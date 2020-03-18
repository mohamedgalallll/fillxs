<?php

namespace App\Http\Controllers;

use App\Ad;
use App\Category;
use App\Sub_Category;
use Illuminate\Http\Request;

class AdController extends Controller
{
    public function index()
    {
        return view('ads.addAds');
    }

    public function allAds()
    {
        $ads = Ad::where('status', '0')->get();
        return view('DashBoardAdmin.pending', compact('ads'));
    }

    public function oneAD($id)
    {
        $showOneAd = Ad::findOrFail($id);
        return view('DashBoardAdmin.showOneAd', compact('showOneAd'));
    }

    public function approve($id)
    {
        $approve = Ad::findOrFail($id);
        $date['status'] = 1;
        $approve->update($date);
        return redirect()->back();
    }

    public function reject($id)
    {
        $reject = Ad::findOrFail($id);
        $date['status'] = 2;
        $reject->update($date);
        return redirect()->back();
    }

    public function myAds()
    {
        $myAds = Ad::all();
        return view('user_setting.myads', compact('myAds'));
    }


    public function create()
    {

    }

    public function store($cat_id, $sub_id, Request $request)
    {

        $input = $this->validate(request(), [
            'title' => 'required|',
            'price' => 'required|',
            'phone' => 'required|',
            'city' => 'required|',
            'info' => 'required|',
            'info2' => 'required|',
            'info3' => 'required|',
            'info4' => 'required|',
            'desc' => 'required|',
            'img1' => 'required|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'img2' => 'mimes:jpeg,png,jpg,gif,svg|max:2048',
            'img3' => 'mimes:jpeg,png,jpg,gif,svg|max:2048',
            'img4' => 'mimes:jpeg,png,jpg,gif,svg|max:2048',
            'img5' => 'mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        if ($request->hasFile('img1') && request()->has('img1')) {
            $input['img1'] = $this->storeFile($request->img1);
        }
        if ($request->hasFile('img2') && request()->has('img2')) {
            $input['img2'] = $this->storeFile($request->img2);
        }
        if ($request->hasFile('img3') && request()->has('img3')) {
            $input['img3'] = $this->storeFile($request->img3);
        }
        if ($request->hasFile('img4') && request()->has('img4')) {
            $input['img4'] = $this->storeFile($request->img4);
        }
        if ($request->hasFile('img5') && request()->has('img5')) {
            $input['img5'] = $this->storeFile($request->img5);
        }
        // url('storage' . $item->image_en)
        $cat_id = Category::findOrFail($cat_id)->id;
        $sub_id = Sub_Category::findOrFail($sub_id)->id;
        $input['category_id'] = $cat_id;
        $input['sub_category_id'] = $sub_id;
        $input['user_id'] = auth()->user()->id;
        Ad::create($input);
        return redirect('/')->with('status', 'your ad is created successfully');
    }

    public function Details($id)
    {
        $detials = Ad::findOrFail($id);

        return view('ads.Details', compact('detials'));
    }

    public function Ads(Request $request)
    {
        $mainCat = $request->mainCat ? $request->mainCat : null;
        $supCat = $request->subCat ? $request->subCat : null;
        $min = $request->min ? $request->min : Ad::min('price');
        $max = $request->max ? $request->max : Ad::max('price');

        $ads = Ad::where('price','>=', $min)
            ->where('price', '<=', $max)
            ->where(function ($q) use ($mainCat, $supCat) {
                if ($mainCat) {
                    $q->when($mainCat, function ($q, $mainCat) {
                        return $q->where('category_id', $mainCat);
                    });
                }
                if ($supCat) {
                    $q->when($supCat, function ($q, $supCat) {
                        return $q->where('sub_category_id', $supCat);
                    });
                }
            })
            ->paginate(10);
        return view('ads.ads', compact('ads'));
    }

    public function GetSubCategories(Request $request){
        $item =  Sub_Category::where('cat_id',$request->main_category_id)->get();
        return response()->json($item);
    }


}
