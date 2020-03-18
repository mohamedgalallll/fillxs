@extends('DashBoardAdmin.layouts.master')

@section('content')       
    <div class="row">
         @if($errors->any())
            @foreach ($errors->all() as $error)
                <div class="alert alert-danger" role="alert">{{ $error }}</div>
            @endforeach
        @endif
        <div type="button" class=" btn btn-dark  btn-block"> <h2 class="text-white">update Category</h2> </div>
    <form class="col-12" action="{{url('/update/' . $categories->id)}}" method="POST">
        @csrf
        @method('PATCH')
            <div class="form-group">
                <label for="exampleInputEmail1">Title in Arabic</label>
                <input type="text" class="form-control" value="{{$categories->title_in_ar}}" id="exampleInputEmail1" name="title_in_ar" aria-describedby="Arabic" placeholder="العنوان عربي">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Title in English</label>
                <input type="text" class="form-control" value="{{$categories->title_in_en}}" id="exampleInputEmail1" name="title_in_en" aria-describedby="English" placeholder="Title in English">
            </div>
            <div class="form-group">
                <label for="icon">Icons</label>
                <input type="text" class="form-control" id="icon" value="{{$categories->icon}}" name="icons" aria-describedby="icons" placeholder=" Add Class Name Icon Category">
            </div>
            
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
   
   