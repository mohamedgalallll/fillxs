@extends('DashBoardAdmin.layouts.master')

@section('content')

<div class="danger">
  @if(session()->get('Add'))
    <div class="alert alert-info">
      {{ session()->get('Add') }}  
    </div><br/>
  @endif
  <div class="success">
    @if(session()->get('update'))
      <div class="alert alert-success">
        {{ session()->get('update') }}  
      </div><br/>
    @endif
    <div class="danger">
      @if(session()->get('status'))
        <div class="alert alert-danger">
          {{ session()->get('status') }}  
        </div><br/>
      @endif
      <div type="button" class=" btn btn-dark btn-lg btn-block">All Sub Categories</div>

<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col"> Sub ID</th>
      <th scope="col">Title Arabic</th>
      <th scope="col">Title English</th>
      <th scope="col">Date</th>
      <th scope="col"> category ID</th>
      <th scope="col">Control</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($Sub_Categories as $Subcat)
      <tr>
        <th scope="row">{{$Subcat->id}}</th>
        <td>{{$Subcat->title_in_ar}}</td>
        <td>{{$Subcat->title_in_en}}</td>
        <td>{{$Subcat->created_at}}</td>
        <td> {{$Subcat->cat_id}}</td>
        <td>
        <a  href="{{url('/editSubCategory/'. $Subcat->id )}}" class="btn btn-primary">Edit</a>
        <a  href="{{url('/SubCategory/delete/'.$Subcat->id)}}" class="btn btn-danger">Delete</a>
        </td>
      </tr>
    @endforeach
  </tbody>
</table>


@endsection
