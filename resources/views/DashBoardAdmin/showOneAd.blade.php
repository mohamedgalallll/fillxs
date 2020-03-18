@extends('DashBoardAdmin.layouts.master')

@section('content')
    <div class="row ">
        {{-- <div class="col-md-2"></div> --}}

            <div class="card mb-3 col-md-8 offset-md-2 mycard">
                <div class="borderleft ">
                    <div class="featured"><span>Featured</span> </div>
                    <div class="row">
                        <div class="col-md-6">
                            <h2 class="name-ad">
                                <a href="">
                                    {{$showOneAd->title}}
                                </a>
                            </h2>
                        </div>
                        <div class="col-md-6">
                            <div class="text-right price">
                                {{$showOneAd->price}}

                            </div>
                        </div>
                    </div>
                    <div class="row no-gutters ">
                        <div class="col-md-4">
                            <a href="">
                                <img src="{{url('storage'. $showOneAd->img1)}}" class="card-img" alt="image Ads">
                            </a>
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">

                                <h5 class="card-title name-ad mb-0 pb-0">
                                    <a href="">
                                        {{$showOneAd->title}}
                                    </a>
                                </h5>
                                <p class="card-text"><small class="text-muted">{{$showOneAd->created_at}}</small></p>
                                <div class="row">
                                    <div class="col-md-6 ">
                                        <p class="mb-0"><span class="font-info">{{$showOneAd->info}}</strong></p>
                                        <p class="mb-0"><span class="font-info">{{$showOneAd->info2}}</strong></p>

                                    </div>
                                    <div class="col-md-6">
                                        <p class="mb-0"><span class="font-info">{{$showOneAd->phone}}</strong></p>
                                        <p class="mb-0"><span class="font-info">{{$showOneAd->desc}}</strong></p>

                                    </div>

                                </div>
                                <div>
                                    <a href="" class="btn btn-primary pt-1 pb-1 mt-2"> <i class="far fa-file-alt"></i>
                                        CarReport Available
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="location col-md-6">

                            <p class="card-text"><small class="text-dark"><i class="fas fa-map-marker-alt"></i> {{$showOneAd->city}}  </small></p>

                        </div>
                        <div class="col-md-6 text-right ">
                            <a href="" class="btn" title="Click here to Add Favorites"> <i class="far fa-star"></i></a>
                            </a>
                        </div>
                    </div>
                </div>
                <hr>
            </div>


        <div class="col-md-2"></div>
    </div>
@endsection
