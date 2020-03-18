@extends('layouts.mastar')

@section('content')

        <div class="myslide mt-4">
        <div class="container">
            <div class="row">
                <div class="col-8">
                    <ul id="imageGallery">
                        @if(!empty($detials->img1))
                            <li data-thumb="{{url('storage'. $detials->img1)}}" data-src="{{url('storage'. $detials->img1)}}">
                                <img class="img-fluid" src="{{url('storage'. $detials->img1)}}" />
                            </li>
                        @endif
                            @if(!empty($detials->img2))
                        <li data-thumb="{{url('storage'. $detials->img2)}}" data-src="{{url('storage'. $detials->img2)}}">
                            <img class="img-fluid" src="{{url('storage'. $detials->img2)}}" />
                        </li>
                        @endif
                            @if(!empty($detials->img3))
                            <li data-thumb="{{url('storage'. $detials->img3)}}" data-src="{{url('storage'. $detials->img3)}}">
                                <img class="img-fluid" src="{{url('storage'. $detials->img3)}}" />
                            </li>
                        @endif
                            @if(!empty($detials->img4))
                            <li data-thumb="{{url('storage'. $detials->img4)}}" data-src="{{url('storage'. $detials->img4)}}">
                                <img class="img-fluid" src="{{url('storage'. $detials->img4)}}" />
                            </li>
                        @endif
                        @if(!empty($detials->img5))
                            <li data-thumb="{{url('storage'. $detials->img5)}}" data-src="{{url('storage'. $detials->img5)}}">
                                <img class="img-fluid" src="{{url('storage'. $detials->img5)}}" />
                            </li>
                        @endif
                    </ul>
                    <div class="details mt-4">
                        <div class="row">
                            <div class="col-6  text-left ">
                                <h4 class="price_de">
                                    20000000$
                                </h4>
                            </div>
                            <div class="col-6 text-right datePost"><span>{{trans('web.PostIn')}} : </span> {{$detials->created_at}}
                            </div>
                        </div>
                        <div class="row mt-5">
                            <div class="col-6">
                                <div>
                                    <p>{{trans('web.type')}} :</p>
                                </div>
                                <div>
                                    <p>{{trans('web.moreInfo')}} :</p>
                                </div>
                                <div>
                                    <p>{{trans('web.moreInfo')}} :</p>
                                </div>
                                <div>
                                    <p>{{trans('web.moreInfo')}} :</p>
                                </div>
                                <div>
                                    <p>{{trans('web.moreInfo')}} :</p>
                                </div>
                                <div>
                                    <p>{{trans('web.location')}}</p>
                                </div>
                                <div>
                                    <p>{{trans('web.description')}}</p>
                                </div>

                            </div>
                            <div class="col-6">
                                <p>{{$detials->title}}</p>
                               <p>{{$detials->info}}</p>
                                <p>{{$detials->info2}}</p>
                                <p>{{$detials->info3}}</p>
                                <p>{{$detials->info4}}</p>
                                <p>{{$detials->city}}</p>
                                <p>{{$detials->desc}}</p>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="col-4">
                    <div class="row ">
                        <div class="col-12 ">
                            <div class="padding-info">
                                <button type="button" class="btn btn-primary col-12 mb-3" id="showEmail" onclick="myFun()" > <i class="far fa-envelope"></i> Send Replay </button>
                                <button type="button" class="btn btn-primary col-12" id="showPhone" onclick="myFunction()"> <i class="fas fa-phone-alt"></i> Show Phone number</button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        </div>
@endsection
@section('js')
    <script>
        function myFunction() {
            document.getElementById("showPhone").innerHTML = "{{$detials->phone}}";
        }
        function myFun() {
            document.getElementById("showEmail").innerHTML = "{{}}";
        }
    </script>
@stop
