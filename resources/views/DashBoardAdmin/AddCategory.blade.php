@extends('DashBoardAdmin.layouts.master')

@section('content')       
    <div class="row">
        @if($errors->any())
            @foreach ($errors->all() as $error)
                <div class="alert alert-danger" role="alert">{{ $error }}</div>
            @endforeach
        @endif

    <div class=" btn btn-dark  btn-block"> <h2 class="text-white">Add Category</h2> </div>

    <form class="col-12" action="{{route('saving')}}" method="POST">
        @csrf
            <div class="form-group">
                <label for="title_in_ar">Title in Arabic</label>
                <input type="text" class="form-control" value="{{old('title_in_ar')}}" id="title_in_ar" name="title_in_ar" aria-describedby="Arabic" placeholder="العنوان عربي">
            </div>
            <div class="form-group">
                <label for="title_in_en">Title in English</label>
                <input type="text" class="form-control" id="title_in_en" value="{{old('title_in_en')}}" name="title_in_en" aria-describedby="English" placeholder="Title in English">
            </div>
            <div class="form-group">
                <label for="icon">Icons</label>
                <input type="text" class="form-control" id="icon" value="{{old('icon')}}" name="icon" aria-describedby="icon" placeholder=" Add Class Name Icon Category">
            </div>
            <button type="submit" class="btn btn-primary">Add </button>
        </form>
    </div>
@endsection
   
   