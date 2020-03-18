@extends('layouts.app')

@section('content')
<div>
    <div  class="span12">
        <h2 class="listing-question text-center">
            {{trans('web.now')}}<br>{{trans('web.youre')}}
        </h2>
    </div>
    <div  class="container">
        <!-- Classifier message -->
        <div class="sub-category-style row">
            <div class="col-4"></div>
            <div class="col-4">
                <ul class="list-group list-group-flush">
                    @foreach($sub_category as $Sub)
                    <a href="{{url()->current().'/sub/'.$Sub->id}}">
                        <li class="list-group-item">{{$Sub->title_in_en}}  <span class="text-left"><i class="fas fa-angle-right"></i></span></li>
                    </a>
                    @endforeach
                </ul>
            </div>
            <div class="col-4"></div>

        </div>
    </div>
</div>
@endsection
