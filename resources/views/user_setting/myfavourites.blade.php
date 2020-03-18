@extends('layouts.mastar')

@section('content')

            <div class="container">

                <div class="cont">

                    <div class="breadcrumbs mb-3">
                        <span>
                            <a href="{{url('/')}}">{{trans('web.home')}}</a>
                        </span>
                        <span>></span>
                        <span>
                            <a href="{{url('/myfavourites')}}">{{trans('web.myFavorites')}}</a>
                        </span>
                    </div>


                    <nav class="mb-3">
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        <a class="nav-item nav-link" href="{{url('/profile')}}">{{trans('web.myProfile')}}</a>
                        <a class="nav-item nav-link" href="{{url('/myads')}}">My Ads</a>
                        <a class="nav-item nav-link active" href="{{url('/myfavourites')}}">{{trans('web.myFavorites')}}</a>
                    </div>
                    </nav>


                    <div class="myfavourits">
                        <div class="row">
                            <div class="col-md-6 offset-md-3">
                                    <div class="empty">
                                        <div class="row">
                                            <div class="col-md-2 empty-low  align-self-center" >
                                                <img src="{{url("image/BatteryLow-512.png")}}" width="55px"alt="">
                                            </div>
                                            <div class="col-md-10 align-self-center text-low">
                                                <span>{{trans('web.yourFavoritesIsEmpty')}}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-md-2 full  align-self-center" >
                                            <img src="{{url("image/13-512.png")}}" width="55px"alt="">
                                        </div>
                                        <div class="col-md-10 align-self-center text-full">
                                           <span> {{trans('web.toFillYourFavorites')}}</span>
                                        </div>
                                    </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>



@endsection
