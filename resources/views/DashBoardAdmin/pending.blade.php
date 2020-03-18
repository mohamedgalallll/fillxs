@extends('DashBoardAdmin.layouts.master')

@section('content')
    <table class="table">
        <thead class="thead-dark">
        <tr>
            <th scope="col">User Name</th>
            <th scope="col">Title</th>
            <th scope="col">Accept Or Reject</th>
            <th scope="col">Show</th>

        </tr>
        </thead>
        <tbody>
        @foreach ($ads as $ad)
            <tr>
                <td>{{$ad->user_id}}</td>
                <td>{{$ad->title}}</td>
                <td>
                    <a href="{{url('/approve/' . $ad->id )}}" class="btn btn-primary">Approve</a>
                    <a href="{{url('/reject/' . $ad->id )}}" class="btn btn-danger">Reject</a>
                </td>
                <td>
                    <a href="{{url('/showAd/' . $ad->id)}}" class="btn btn-success">Show</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
