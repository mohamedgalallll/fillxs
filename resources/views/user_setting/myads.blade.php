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
                            <a href="{{url('/myads')}}">{{trans('web.myAds')}}</a>
                        </span>
                    </div>

                    <nav class="mb-3">
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        <a class="nav-item nav-link" href="{{url('/profile')}}">{{trans('web.myProfile')}}</a>
                        <a class="nav-item nav-link active" href="{{url('/myads')}}">{{trans('web.myAds')}}</a>
                        <a class="nav-item nav-link" href="{{url('/myfavourites')}}">{{trans('web.myFavorites')}}</a>
                    </div>
                    </nav>


                    <div class="ads">
                        <div class="row">
                            <div class="col-12">
                                <div class="myads" >
                                    <h4>
                                    <a href="" class="link-ad">Motors (0)</a>
                                    </h4>
                                </div>
                                <div class="myads" >
                                    <h4>
                                    <a href="" class="link-ad">Classifieds (0)</a>
                                    </h4>
                                </div>
                                <div class="myads" >
                                    <h4>
                                    <a href="" class="link-ad">Property for Sale (0)</a>
                                    </h4>
                                </div>
                                <div class="myads" >
                                    <h4>
                                    <a href="" class="link-ad">Property for Rent (0)</a>
                                    </h4>
                                </div>
                                <div class="myads" >
                                    <h4>
                                    <a href="" class="link-ad">Jobs (0)</a>
                                    </h4>
                                </div>
                                <div class="myads" >
                                    <h4>
                                    <a href="" class="link-ad">Jobs Wanted (0)</a>
                                    </h4>
                                </div>
                                <div class="myads" >
                                    <h4>
                                    <a href="" class="link-ad">Community (0)</a>
                                    </h4>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>



@endsection
