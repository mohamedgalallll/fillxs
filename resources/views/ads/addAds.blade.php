@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row">
        <div class="span12 text-center col-12">
            <h2 class="listing-question">
               {{trans('web.youre')}}
            </h2>
            <h3 class="pre-select-cat">
                {{trans('web.tell')}}
            </h3>
        </div>
        <div class="col-4 offset-4">
             @if($errors->any())
                @foreach ($errors->all() as $error)
                    <div class="p-2 mb-1 bg-danger text-white">
                        {{ $error }}
                    </div>
                @endforeach
            @endif
        <form action="{{url()->current()}}" method="POST" enctype="multipart/form-data">
                @csrf
                 <div class="form-group">
                    <input type="text" class="form-control" placeholder=" {{trans('web.title')}}" name="title">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" placeholder=" {{trans('web.price')}}" name="price">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" placeholder=" {{trans('web.phone')}}" name="phone">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" placeholder=" {{trans('web.city')}}" name="city">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" placeholder=" {{trans('web.more')}}" name="info">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" placeholder=" {{trans('web.more')}}" name="info2">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" placeholder=" {{trans('web.more')}}" name="info3">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" placeholder=" {{trans('web.more')}}" name="info4">
                </div>
                <div class="form-group">
                    <input type="file" class="form-control" name="img1">
                </div>
                <div class="form-group">
                    <input type="file" class="form-control" name="img2">
                </div>
                <div class="form-group">
                    <input type="file" class="form-control" name="img3">
                </div>
                <div class="form-group">
                    <input type="file" class="form-control" name="img4">
                </div>
                <div class="form-group">
                    <input type="file" class="form-control" name="img5">
                </div>
                <div class="form-group">
                    <textarea class="form-control" id="descripe" rows="3" placeholder=" {{trans('web.descripe')}}" name="desc"></textarea>
                </div>


                <button type="submit" class="btn btn-danger form-control">Submit</button>
            </form>
        </div>
    </div>

</div>
@endsection
