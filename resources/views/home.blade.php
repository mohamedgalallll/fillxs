@extends('layouts.mastar')

@section('content')
    {{--  --}}
    <div class="back-ground">
        <div class="container">
            <form method="get" action="{{url('search')}}">
                <div class="home-slider">
                    <div class="row" style="margin-left: 0; margin-right: 0;">
                        <div class="col-md-2"></div>
                        <div class="col-md-8">
                            <h3 class="text-white pb-4 text-center">
                                {{trans('web.header')}}
                            </h3>
                            <div class="Searchbox__container">
                                <div class="Searchbox__bottom mb-0">

                                    <div class="row pr-3 pl-3">
                                        <label class="text-white border-left-0 col text-center" style="font-size: 12px">
{{--                                            <i class="fas fa-search"></i>--}}
                                            <span class="text-white d-block">{{trans('web.searchAbout') }}</span>
                                        </label>
                                            @foreach ($categories as $category)

                                            <label class="text-center col searchBox">
                                                <input type="radio" name="MainCat"  class="SearchRadioInput" checked="false"  value="{{$category->id}}">
                                                <i class="fas {{$category->icon}}"></i>
                                                <span class="text-white d-block">{{$category->title}}</span>
                                            </label>
                                            @endforeach
                                    </div>
                                </div>
                                <div class="Searchbox__bottom mt-0">
                                    <div class="container">
                                    <div class="row">
                                        <div class="col-md-9">
                                            <input type="text" name="keywords"
                                                   class="Searchbox__keyword__input form-control" placeholder="{{trans('web.searchAbout')}}">
                                        </div>
                                        <div class="col-md-3">
                                            <input type="submit" class="btn btn-danger btn-block Searchbox__search__button" value="{{trans('web.search')}}">
                                        </div>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2"></div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    {{--  --}}
    <div class="container">
        <div class="Trending">
            <div class="header mt-5 mb-4">
                <h4><span class="font-weight-bold">{{trans('web.trending')}} </span> {{trans('web.dubizzle')}}</h4>
            </div>
            <div class="content">
                <div class="row">
                    <div class="col-md-2 col-6 pb-2">
                        <div class="card">
                            <a href="#">
                                <img src="{{ url('image/number_plate.jpg') }}" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h6 class="card-title trending-title ">{{trans('web.numberPlates')}}</h6>
                                    <p class="card-text trending-text">Motors</p>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-2 col-6">
                        <div class="card">
                            <a href="#">
                                <img src="{{url('image/apartment_for_sale.jpg')}}" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h6 class="card-title trending-title"> {{trans('web.apartmentForSale')}}</h6>
                                    <p class="card-text trending-text">Property for Sale</p>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-2 col-6 pb-2">
                        <div class="card">
                            <a href="#">
                                <img src="{{url('image/furniture.jpg')}}" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title trending-title"> {{trans('web.furniture')}}</h5>
                                    <p class="card-text trending-text">Classifieds</p>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-2 col-6">
                        <div class="card">
                            <a href="#">
                                <img src="{{url('image/clothing_accessories.jpg')}}" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h6 class="card-title trending-title "> {{trans('web.clothingAccessories')}}</h6>
                                    <p class="card-text trending-text">Classifieds</p>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-2 col-6 pb-2">
                        <div class="card">
                            <a href="#" class="">
                                <img src="{{url('image/electronics.jpg')}}" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title trending-title">{{trans('web.electronics')}}</h5>
                                    <p class="card-text trending-text">Classifieds</p>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-2 col-6">
                        <div class="card">
                            <a href="#">
                                <img src="{{url('image/home_appliances.jpg')}}" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title trending-title">{{trans('web.homeAppliances')}}</h5>
                                    <p class="card-text trending-text">Classifieds</p>
                                </div>
                            </a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        {{-- ------------------------------------- --}}
        <div class="Popular ">
            <div class="header mt-4 mb-3">
                <h4><span class="font-weight-bold">{{trans('web.popular')}}</span> {{trans('web.dubizzle')}}</h4>
            </div>
            <div class="mb-5">
                <div class="row">
                    @foreach ($categories as $category)
                        <div class="col-md-4">
                            <a href="{{url('/ads?mainCat='.$category->id)}}"><span class="popular-motors">{{$category->title_in_en}}</span><span class="popular-num"></span></a>
                            <div>
                                @foreach (App\Sub_Category::where('cat_id', $category->id)->get()  as $supCat)
                                    <a href="{{url('/ads/?mainCat='.$category->id).'&subCat='.$supCat->id}}" class="linkes-popular mt-2">{{$supCat->title_in_en}}</a>
                                @endforeach
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>


        </div>
    </div>
@endsection
