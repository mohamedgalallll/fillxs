@extends('DashBoardAdmin.layouts.master')

@section('content')

    <div class="danger">
      @if(session()->get('Delete'))
        <div class="alert alert-danger">
          {{ session()->get('Delete') }}
        </div><br/>
      @endif
      <div type="button" class=" btn btn-dark btn-lg btn-block">All Users</div>
    <div class="table-responsive">
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col"> User ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Photo</th>
                    <th scope="col"> Gender</th>
                    <th scope="col"> Nationality</th>
                    <th scope="col">Birthday</th>
                    <th scope="col">Career</th>
                    <th scope="col">Location</th>
                    <th scope="col"> Position</th>
                    <th scope="col"> Company</th>
                    <th scope="col">Salary</th>
                    <th scope="col">Commitment</th>
                    <th scope="col">Notice_period</th>
                    <th scope="col"> Visa_status</th>
                    <th scope="col">Academic</th>
                    <th scope="col">Summary_cv</th>
                    <th scope="col">Created_at</th>
                    <th scope="col">Control</th>
                </tr>
            </thead>
        <tbody>
            @foreach ($Users as $user)
                <tr>
                    <th scope="row">{{$user->id}}</th>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>
                        @if ($user->avatar)
                            <img class="userimg rounded-circle mr-1" src="{{ url( 'storage', $user->avatar ) }} "alt="" alt="myimg" width="25px" height="25px">
                        @else
                            <img class="userimg rounded-circle mr-1" src="{{ url('storage/users_img/img.png') }}"
                            alt="myimg" width="25px" height="25px">
                         @endif
                    </td>
                    <td>{{$user->gender}}</td>
                    <td>{{$user->nationality}}</td>
                    <td>{{$user->birthday}}</td>
                    <td>{{$user->career}}</td>
                    <td>{{$user->location}}</td>
                    <td>{{$user->position}}</td>
                    <td>{{$user->company}}</th>
                    <td>{{$user->salary}}</td>
                    <td>{{$user->commitment}}</td>
                    <td>{{$user->notice_period}}</td>
                    <td> {{$user->visa_status}}</td>
                    <td>{{$user->academic}}</td>
                    <td> {{$user->summary_cv}}</td>
                    <td>{{$user->created_at}}</td>
                    <td>
                        @if ($user->isAdmin == '')
                            <a href="{{url('/delete/user/'.$user->id)}}" class="btn btn-danger">Delete</a>
                        @else
                            <a href="" class="btn  btn-secondary disabled">Delete Admin is not allowed</a>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
