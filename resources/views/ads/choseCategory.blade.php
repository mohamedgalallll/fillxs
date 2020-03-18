@extends('layouts.app')

@section('content')
<div>
    <div  class="span12">
        <h2 class="listing-question text-center">
            {{trans('web.hello')}} </h2>
        <h3 class="pre-select-cat text-center">
            {{trans('web.select')}}
        </h3>
    </div>
    <div  class="container">
        <!-- Classifier message -->
        <div class="text-center  row">
            <div class="col-md-6 offset-sm-3">
                <div class="row">
                    @foreach ($categories as $category)
                        <div class="col-md-4 col-6 mb-4">
                            <a href="{{url('/Category') .'/' .$category->id}}">
                                    <div class="section-box">
                                        <div class="text-center icon-category">
                                            <i class="fas {{$category->icon}}"></i>
                                            <h3 class="text-center">{{$category->title_in_en}}</h3>
                                        </div>
                                    </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
