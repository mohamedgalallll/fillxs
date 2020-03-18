@extends('DashBoardAdmin.layouts.master')

@section('content')

    @if(session()->get('Add'))
    <div class="alert alert-info">
      {{ session()->get('Add') }}
    </div>
    <br />
    @endif
  <div class="success">
    @if(session()->get('update'))
    <div class="alert alert-success">
      {{ session()->get('update') }}
    </div>
    <br />
    @endif
  </div>
  <div class="danger">
    @if(session()->get('status'))
    <div class="alert alert-danger">
      {{ session()->get('status') }}
    </div>
    <br />
    @endif
  </div>
  <div type="button" class=" btn btn-dark btn-lg btn-block">All Categories</div>

  <table class="table">
    <thead class="thead-dark">
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Title Arabic</th>
        <th scope="col">Title English</th>
        <th scope="col">Date</th>
        <th scope="col">Class Name Icons</th>
        <th scope="col">Control</th>
        <th scope="col">Sub Category</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($categories as $cat)
      <tr>
        <th scope="row">{{$cat->id}}</th>
        <td>{{$cat->title_in_ar}}</td>
        <td>{{$cat->title_in_en}}</td>
        <td>{{$cat->created_at}}</td>
        <td>{{$cat->icon}}</td>

        <td>
          <a href="{{url('/edit/'. $cat->id )}}" class="btn btn-primary">Edit</a>
          <a href="{{url('/categry/delete/'.$cat->id)}}" class="btn btn-danger">Delete</a>

        </td>
        <td>
          <a href="{{url('/GetSubCategory/'.$cat->id)}}" class="btn btn-success">Show</a>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>


  @endsection