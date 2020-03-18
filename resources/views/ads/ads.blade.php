@extends('layouts.mastar')
@section('js')
    <script>
        $(document).ready(function () {

            $( "#slider-range" ).slider({
                range: true,
                min:{{\App\Ad::min('price')}},
                max:{{\App\Ad::max('price')}},
                values: [ {{request('min') ? request('min') : \App\Ad::min('price')}}, {{request('max') ? request('max') : \App\Ad::max('price')}} ],
                slide: function( event, ui ) {
                    $('#min').val(ui.values[ 0 ]);
                    $('#max').val(ui.values[ 1 ]);
                    $( "#amount" ).html( "" + ui.values[ 0 ] + " -  " + ui.values[ 1 ] );
                }
            });

            $('#min').val($( "#slider-range" ).slider( "values", 0 ));
            $('#max').val($( "#slider-range" ).slider( "values", 1 ));
            $( "#amount" ).html( "" + $( "#slider-range" ).slider( "values", 0 ) +
                " -  " + $( "#slider-range" ).slider( "values", 1 ) );


            $('#mainCategoryToSelect').change(function () {
                var category_id = $(this).val();
                if (category_id) {
                    $.ajax({
                        type: "GET",
                        url: "{{url('/getSubCategories')}}?main_category_id=" + category_id,
                        success: function (res) {
                            if (res) {
                                $("#sup_category_id").empty();
                                $("#sup_sup_category_id").empty();
                                $("#sup_category_id").parent().parent().fadeIn();
                                $("#sup_category_id").append('<option value="" >{{trans('web.subCat')}}</option>');
                                $.each(res, function (key,value) {
                                    $("#sup_category_id").append('<option value="' + value.id + '">' + value.title + '</option>');
                                });

                            } else {
                                $("#sup_category_id").empty();
                                $("#sup_sup_category_id").empty();
                            }
                        }
                    });
                } else {
                    $("#sup_category_id").empty();
                    $("#sup_sup_category_id").empty();
                }
            });
        });
    </script>
@stop
@section('content')
    <div class="container">
        @if(session()->get('status'))
            <div class="alert alert-info">
                {{ session()->get('status') }}
            </div>
            <br/>
        @endif
        <div class="row ">


            <div class="col-md-3 filter-search">
                <p class="h4 text-center search_head">{{trans('web.search')}}</p>
                <form action="{{url('/ads')}}" method="get">
                    <div>
                        <label for="amount">Price range: <br> <strong id="amount"></strong></label>
                        <input type="hidden" name="min" id="min">
                        <input type="hidden" name="max" id="max">
                    </div>
                    <div id="slider-range"></div>
                    <p class="h6 mt-3">{{trans('web.mainCat')}}</p>
                    <select class="form-control" id="mainCategoryToSelect" name="mainCat">
                        <option value="">{{trans('web.mainCat')}}</option>
                        @foreach (\App\Category::all()  as $cat)
                            <option {{request('mainCat') == $cat->id ? 'selected' : ''}} value="{{$cat->id}}">{{$cat->title}}</option>
                        @endforeach
                    </select>
                    <p class="h6 mt-3">{{trans('web.subCat')}}</p>
                    <select class="form-control" id="sup_category_id" name="subCat">
                        <option value="" >{{trans('web.subCat')}}</option>

                        @if (request('mainCat'))
                            @foreach (\App\Sub_Category::where('cat_id',request('mainCat'))->get()  as $subCat)
                                <option {{request('subCat') == $subCat->id ? 'selected' : ''}} value="{{$subCat->id}}">{{$subCat->title}}</option>
                            @endforeach
                        @endif
                    </select>
                    <button class="btn btn-danger form-control mt-3">{{trans('web.search')}}</button>
                </form>
            </div>

            <div class="col-md-9 row">
                @foreach ($ads as $ad)
                    <div class="card mb-3 col-md-12 mycard">
                        <div class="borderleft ">
                            <div class="featured"><span>Featured</span></div>
                            <div class="row">
                                <div class="col-md-6">
                                    <h2 class="name-ad">
                                        <a href="{{url('/ads/Details').'/'.$ad->id}}">
                                            {{$ad->title}}
                                        </a>
                                    </h2>
                                </div>
                                <div class="col-md-6">
                                    <div class="text-right price">
                                        {{$ad->price}}
                                    </div>
                                </div>
                            </div>
                            <div class="row no-gutters ">
                                <div class="col-md-4">
                                    <a href="{{url('/ads/Details').'/'.$ad->id}}">
                                        <img src="{{url('storage'. $ad->img1)}}" class="card-img" alt="image Ads">
                                    </a>
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">

                                        <h5 class="card-title name-ad mb-0 pb-0">
                                            <a href="{{url('/ads/Details').'/'.$ad->id}}">
                                                {{$ad->title}}
                                            </a>
                                        </h5>
                                        <p class="card-text"><small class="text-muted">{{$ad->created_at}}</small></p>
                                        <div class="row">
                                            <div class="col-md-6 ">
                                                <p class="mb-0"><strong class="font-info">{{$ad->info}}</strong></p>
                                                <p class="mb-0"><strong class="font-info">{{$ad->info2}}</strong></p>
                                            </div>
                                            <div class="col-md-6">
                                                <p class="mb-0"><strong class="font-info">{{$ad->phone}}</strong></p>
                                                <p class="mb-0"><strong class="font-info">{{$ad->desc}}</strong></p>
                                            </div>

                                        </div>
                                        <div>
                                            <a href="" class="btn btn-primary pt-1 pb-1 mt-2"> <i
                                                    class="far fa-file-alt"></i>
                                                CarReport Available
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="location col-md-6">

                                    <p class="card-text"><small class="text-dark"><i
                                                class="fas fa-map-marker-alt"></i> {{$ad->city}}  </small></p>

                                </div>
                                <div class="col-md-6 text-right ">
                                    <a href="" class="btn" title="Click here to Add Favorites"> <i class="far fa-star"></i></a>
                                </div>
                            </div>
                        </div>
                        <hr>
                    </div>
                @endforeach
            </div>

            <div class=" row col-md-12">
                <div class=" text-center m-auto">
                    {{ $ads->appends(request()->query())->links() }}
{{--                    {{ $ads->appends($_GET)->links() }}--}}
                </div>
            </div>

        </div>

    </div>
@endsection
