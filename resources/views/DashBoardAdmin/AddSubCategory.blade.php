@extends('DashBoardAdmin.layouts.master')

@section('content')
 @if($errors->any())
            @foreach ($errors->all() as $error)
                <div class="alert alert-danger" role="alert">{{ $error }}</div>
            @endforeach
        @endif
    <div class="row">
              <div type="button" class=" btn btn-dark  btn-block"> <h2 class="text-white">Add Sub Category</h2> </div>

                  
        <form class="col-12" method="post" action="{{route('save.sub')}}">
            @csrf
                <div class="form-group">
                    <label for="exampleInputEmail1">Title in Arabic</label>
                <input type="text" class="form-control " id="exampleInputEmail1" name="title_in_ar" value="{{old('title_in_ar')}}" aria-describedby="Arabic" placeholder=" العنوان عربي">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Title in English</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="title_in_en" value="{{old('title_in_en')}}" aria-describedby="English" placeholder=" title in English">
                </div>
                <div class="form-group">
                    <label for="inputState">State</label>
                    <select id="inputState" name="cat_id" class="form-control" required>
                        <option selected>Choose...</option>
                        @foreach ($Category as $cat)
                    <option value="{{$cat->id}}">{{$cat->title_in_ar}} - {{$cat->title_in_en}}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Add</button>
            </form>
    </div>
@endsection
