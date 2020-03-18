@extends('layouts.mastar')

@section('content')

            <div class="container">

                <div class="cont">

                    <div class="breadcrumbs mb-3">
                        <span>
                            <a href="{{url('/')}}"> {{trans('web.home')}} </button></a>
                        </span>
                        <span>></span>
                        <span>
                            <a href="{{url('/profile')}}">{{trans('web.profile')}}</a>
                        </span>
                        <span>></span>
                        <span>
                            <a href="{{url('/account/setting')}}">{{trans('web.accountSettings')}}</a>
                        </span>
                    </div>



                    <fieldset class=" p-2">
                            <legend  class="w-auto pr-2 mb-0"><i class="fas fa-star text-danger pl-2 pr-1" ></i>{{trans('web.accountSettings')}}</legend>
                            <div class="accordion" id="accordionExample">
                                <div class="card border-none">
                                    @if( $errors->any() )
                                    <div class="alert alert-danger pb-0 pt-0">
                                        <ul class="mb-0">
                                            @foreach ($errors->all() as $error)
                                                <li>{{$error}}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    @endif
                                    @if (session('error'))
                                    <div class="alert alert-danger">
                                        {{session('error')}}
                                    </div>
                                    @endif
                                </div>
                                <div class="card border-none">
                                      <button class="btn  btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        <div class="card-header text-left" id="headingOne">
                                         <strong>Name: </strong>{{auth()->user()->name}} <span class="edit-setting float-right">
                                             <i class="fas fa-pencil-alt text-danger pr-2"></i> {{trans('web.edit')}}</span>
                                          <div class="clearfix"></div>
                                        </div>
                                      </button>
                                  <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                                    <div class="card-body">
                                      <form class="form-inline" action="{{url('/username') . '/' . auth()->user()->id }}" method="post">
                                        @csrf
                                        @method('patch')
                                        <div class="form-group">
                                          <label for="inputname" class="font-size ">{{trans('web.name')}}: </label>
                                            <input name="name" type="text" id="inputname" value="{{auth()->user()->name}}" required class="form-control mx-sm-3 myinput" aria-describedby="passwordHelpInline">
                                        </div>
                                        <button type="submit" class="btn btn-danger">{{trans('web.changeMyName')}}</button>
                                      </form>
                                  </div>
                                  </div>
                                </div>
                                <div class="card border-none ">
                                      <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                          <div class="card-header  text-left " id="headingTwo">
                                             <strong> {{trans('web.password')}}: </strong> **********<span class="edit-setting float-right">
                                                <i class="fas fa-pencil-alt text-danger pr-2"></i> {{trans('web.edit')}}</span>
                                              <div class="clearfix"></div>
                                          </div>
                                      </button>
                                  <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                                    <div class="card-body">
                                    <form class="form-inline" action="{{route('password.change')}}" method="GET">
                                        @csrf
                                          <div class="form-group">

                                            <label for="oldpassword" class="font-size">{{trans('web.oldPassword')}}: </label>
                                            <input id="oldpassword" type="password" class="form-control mx-sm-1 myinput @error('oldPassword') is-invalid @enderror" name="oldPassword" required autocomplete="oldpassword">

                                            @error('oldPassword')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror

                                            <label for="Newpassword" class="font-size">{{trans('web.newPassword')}}: </label>
                                            <input id="Newpassword" type="password" class="form-control mx-sm-1 myinput @error('newPassword') is-invalid @enderror" name="newPassword" required autocomplete="newpassword">

                                            @error('newPassword')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                          <button type="submit" class="btn btn-danger">{{trans('web.changePassword')}}</button>
                                      </form>
                                    </div>
                                  </div>
                                </div>

                                <div class="card border-none">
                                      <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapsefour" aria-expanded="false" aria-controls="collapseThree">
                                        <div class="card-header text-left" id="headingfour">
                                          <strong >{{trans('web.deactivation')}}: </strong>{{trans('web.deleteMyAccount')}} <span class="edit-setting float-right">
                                                <i class="fas fa-pencil-alt text-danger pr-2"></i> {{trans('web.edite')}}</span>
                                          <div class="clearfix"></div>
                                        </div>
                                      </button>
                                  <div id="collapsefour" class="collapse" aria-labelledby="headingfour" data-parent="#accordionExample">
                                    <div class="card-body">
                                    <p class="font-weight-bold d-inline font-size">  {{trans('web.areYouSure')}}</p> <a href="{{url('/account'). '/' .auth()->user()->id .'/delete'}}" class="btn btn-danger">{{trans('web.confirm')}}</a>
                                      <a class="btn btn-danger" href="{{route('account')}}">{{trans('web.cancel')}}</a>
                                    </div>
                                  </div>
                                </div>
                          </div>
                        </fieldset>





                </div>

            </div>



@endsection
