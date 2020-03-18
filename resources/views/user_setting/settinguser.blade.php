@extends('layouts.mastar')

@section('content')

            <div class="container">

                <div class="cont">
                        {{--  --}}
                        <div class="breadcrumbs mb-2 row">
                            <div class="col-6">
                                <span>
                                    <a href="{{url('/')}}">{{trans('web.home')}}</a>
                                    </a>
                                </span>
                                <span>></span>
                                <span>
                                    <a href="{{url('/profile')}}"> {{trans('web.myProfile')}}                                    </a>
                                    </a>
                                </span>
                            </div>
                            <div class="text-right col-6">
                                <span>
                                <a href="{{url('/account/setting')}}">{{trans('web.accountSettings')}}</a>
                                </span>
                            </div>
                        </div>
                        {{--  --}}
                        <nav class="mb-3">
                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                <a class="nav-item nav-link active" href="{{url('/profile')}}">{{trans('web.myProfile')}}</a>
                                <a class="nav-item nav-link" href="{{url('/myads')}}">{{trans('web.myAds')}}</a>
                                <a class="nav-item nav-link" href="{{url('/myfavourites')}}">{{trans('web.myFavorites')}}</a>
                            </div>
                        </nav>
                        {{--  --}}
                        <div class="myprofile">
                            <div class="row">
                                <div class="col-md-8">
                                    <h3>
                                        {{trans('web.ahlanWaSahlan')}}, <strong>{{ auth()->user()->name }}!</strong> <span>({{trans('web.not')}} {{ auth()->user()->name }}?  <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                             {{trans('web.logout')}}
                                         </a>)</span>
                                    </h3>
                                    <span>
                                          @if( $errors->any() )
                                            <div class="alert alert-danger">
                                                <ul>
                                                    @foreach ($errors->all() as $error)
                                                        <li>{{$error}}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        @endif
                                    </span>
                                    <form action="{{url('/profile') .'/'. auth()->user()->id }}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        @method('patch')
                                        <div class="row">

                                            <div class="col-md-3 mt-2">
                                                <label for="img-user">
                                                    @if (auth()->user()->avatar)
                                                    <img class="userimg" src="{{ url( 'storage'. auth()->user()->avatar ) }}" alt="myimg">
                                                    @else
                                                    <img class="userimg" src="{{ url('storage/users_img/img.png') }}" alt="myimg">
                                                    @endif
                                                </label>
                                            </div>
                                            {{-- <span class="change-avatar"></span> --}}

                                            <div class="input col-md-9 pl-0">
                                                <div class="row">

                                                    <div class="col-12 row mb-2" style="font-size:14px">
                                                        <div class="col-3">
                                                            <span class="font-weight-bold"> {{trans('web.name')}}:</span>
                                                        </div>
                                                        <div class="col-9">
                                                            <span>{{auth()->user()->name}}</span>
                                                        </div>
                                                    </div>

                                                    <div class="col-12 row">
                                                        <div class="col-3">
                                                            <label>{{trans('web.changeImage')}}:</label>
                                                        </div>
                                                        <div class="col-9">
                                                            <input type="file" name="avatar" class="myinput" id="img-user" value="{{auth()->user()->avatar}}">
                                                        </div>
                                                    </div>

                                                    <div class="col-12 row">
                                                        <div class="col-3">
                                                            <label for="gender">{{trans('web.gender')}}:</label>
                                                        </div>
                                                        <div class="col-9">
                                                            <select name="gender" id="gender" class="form-control myinput">
                                                                <option value="" selected>------------</option>
                                                                <option value="male" @if(auth()->user()->gender == 'male') selected @endif>{{trans('web.male')}}</option>
                                                                <option value="female" @if(auth()->user()->gender == 'female') selected @endif>{{trans('web.female')}}</option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="col-12 row">
                                                        <div class="col-3">
                                                            <label for="nationality">{{trans('web.nationality')}}:</label>
                                                        </div>
                                                        <div class="col-9">
                                                            <input type="text" name="nationality" value="{{ auth()->user()->nationality }}" class="form-control myinput" id="nationality">
                                                        </div>
                                                    </div>

                                                    <div class="col-12 row">
                                                        <div class="col-3">
                                                            <label for="birthday">{{trans('web.dateOfBirth')}}:</label>
                                                        </div>
                                                        <div class="col-9">
                                                            <input type="date" name="birthday" value="{{ auth()->user()->birthday }}" class="form-control myinput" id="birthday">
                                                        </div>
                                                    </div>

                                                    <div class="col-12 row">
                                                        <div class="col-3">
                                                            <label for="career">{{trans('web.careerLevel')}}:</label>
                                                        </div>
                                                        <div class="col-9">
                                                            <select name="career" id="career" class="form-control myinput">
                                                                <option value="" selected>------------</option>
                                                                <option value="student" @if(auth()->user()->career == 'student') selected @endif>{{trans('web.studentIntern')}}</option>
                                                                <option value="junior" @if(auth()->user()->career == 'junior') selected @endif>{{trans('web.junior')}}</option>
                                                                <option value="mid-level" @if(auth()->user()->career == 'mid-level') selected @endif>{{trans('web.midLevel')}}</option>
                                                                <option value="senior" @if(auth()->user()->career == 'senior') selected @endif>{{trans('web.senior')}}</option>
                                                                <option value="manager" @if(auth()->user()->career == 'manager') selected @endif>{{trans('web.manager')}}</option>
                                                                <option value="director" @if(auth()->user()->career == 'director') selected @endif>{{trans('web.executiveDirector')}}</option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="col-12 row">
                                                        <div class="col-3">
                                                            <label for="location">{{trans('web.currentLocation')}}:</label>
                                                        </div>
                                                        <div class="col-9">
                                                            <input type="text" name="location" value="{{ auth()->user()->location }}" class="form-control myinput" id="location">
                                                        </div>
                                                    </div>


                                                    <div class="col-12 row">
                                                        <div class="col-3">
                                                            <label for="position">{{trans('web.currentPosition')}}:</label>
                                                        </div>
                                                        <div class="col-9">
                                                            <input type="text" name="position" value="{{ auth()->user()->position }}" class="form-control myinput" id="position">
                                                        </div>
                                                    </div>

                                                    <div class="col-12 row">
                                                        <div class="col-3">
                                                            <label for="company">{{trans('web.currentCompany')}}:</label>
                                                        </div>
                                                        <div class="col-9">
                                                            <input type="text" name="company" value="{{ auth()->user()->company }}" class="form-control myinput" id="company">
                                                        </div>
                                                    </div>

                                                    <div class="col-12 row">
                                                        <div class="col-3">
                                                            <label for="salary">{{trans('web.salaryExpectation')}}:</label>
                                                        </div>
                                                        <div class="col-9">
                                                            <select name="salary" id="salary" class="form-control myinput">
                                                                <option value="" selected>------------</option>
                                                                <option value="unspecified" @if(auth()->user()->salary == 'unspecified') selected @endif>Unspecified</option>
                                                                <option value="0-1,999" @if(auth()->user()->salary == '0-1,999') selected @endif>0-1,999</option>
                                                                <option value="2,000-3,999" @if(auth()->user()->salary == '2,000-3,999') selected @endif>2,000-3,999</option>
                                                                <option value="4,000-5,999" @if(auth()->user()->salary == '4,000-5,999') selected @endif>4,000-5,999</option>
                                                                <option value="8,000-11,999" @if(auth()->user()->salary == '8,000-11,999') selected @endif>8,000-11,999</option>
                                                                <option value="12,000-19,999" @if(auth()->user()->salary == '12,000-19,999') selected @endif>12,000-19,999</option>
                                                                <option value="20,000-29,999" @if(auth()->user()->salary == '20,000-29,999') selected @endif>20,000-29,999</option>
                                                                <option value="30,000-49,999" @if(auth()->user()->salary == '30,000-49,999') selected @endif>30,000-49,999</option>
                                                                <option value="50,000-99,999" @if(auth()->user()->salary == '50,000-99,999') selected @endif>50,000-99,999</option>
                                                                <option value="100,000+" @if(auth()->user()->salary == '100,000+') selected @endif>100,000+</option>

                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="col-12 row">
                                                        <div class="col-3">
                                                            <label for="commitment">{{trans('web.commitment')}}:</label>
                                                        </div>
                                                        <div class="col-9">
                                                            <select name="commitment" id="commitment" class="form-control myinput">
                                                                <option value="" selected>------------</option>
                                                                <option value="full-time" @if(auth()->user()->commitment == 'full-time') selected @endif>{{trans('web.fullTime')}}</option>
                                                                <option value="part-time" @if(auth()->user()->commitment == 'part-time') selected @endif>{{trans('web.partTime')}}</option>
                                                                <option value="contract" @if(auth()->user()->commitment == 'contract') selected @endif>{{trans('web.contract')}}</option>
                                                                <option value="temporary" @if(auth()->user()->commitment == 'temporary') selected @endif>{{trans('web.temporary')}}</option>
                                                                <option value="other" @if(auth()->user()->commitment == 'other') selected @endif>{{trans('web.other')}}</option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="col-12 row">
                                                        <div class="col-3">
                                                            <label for="period">Notice Period:</label>
                                                        </div>
                                                        <div class="col-9">
                                                            <select name="notice_period" id="period" class="form-control myinput">
                                                                <option value="" selected>------------</option>
                                                                <option value="none" @if(auth()->user()->notice_period == 'none') selected @endif>{{trans('web.none')}}</option>
                                                                <option value="1-week" @if(auth()->user()->notice_period == '1-week') selected @endif>{{trans('web.oneWeek')}}</option>
                                                                <option value="2-weeks" @if(auth()->user()->notice_period == '2-weeks') selected @endif>{{trans('web.twoWeeks')}}</option>
                                                                <option value="3-weeks" @if(auth()->user()->notice_period == '3-weeks') selected @endif>{{trans('web.threeWeeks')}}</option>
                                                                <option value="1-month" @if(auth()->user()->notice_period == '1-month') selected @endif>{{trans('web.oneMonth')}}</option>
                                                                <option value="2-months" @if(auth()->user()->notice_period == '2-month') selected @endif>{{trans('web.twoMonths')}}</option>
                                                                <option value="more-than" @if(auth()->user()->notice_period == 'more-than') selected @endif>{{trans('web.moreThanTowMonth')}}</option>
                                                            </select>
                                                        </div>
                                                    </div>

{{--                                                    <div class="col-12 row">--}}
{{--                                                        <div class="col-3">--}}
{{--                                                            <label for="visa_status">{{trans('web.visaStatus')}}:</label>--}}
{{--                                                        </div>--}}
{{--                                                        <div class="col-9">--}}
{{--                                                            <select name="visa_status" id="visa_status" class="form-control myinput">--}}
{{--                                                                <option value="" selected>------------</option>--}}
{{--                                                                <option value="applicable" @if(auth()->user()->visa_status == 'applicable') selected @endif>{{trans('web.visaStatus')}}</option>--}}
{{--                                                                <option value="business" @if(auth()->user()->visa_status == 'business') selected @endif>{{trans('web.visaStatus')}}</option>--}}
{{--                                                                <option value="employment" @if(auth()->user()->visa_status == 'employment') selected @endif>{{trans('web.visaStatus')}}</option>--}}
{{--                                                                <option value="residence" @if(auth()->user()->visa_status == 'residence') selected @endif>{{trans('web.visaStatus')}}</option>--}}
{{--                                                                <option value="spouse" @if(auth()->user()->visa_status == 'spouse') selected @endif>{{trans('web.visaStatus')}}</option>--}}
{{--                                                                <option value="student" @if(auth()->user()->visa_status == 'student') selected @endif>{{trans('web.visaStatus')}}</option>--}}
{{--                                                                <option value="tourist" @if(auth()->user()->visa_status == 'tourist') selected @endif>{{trans('web.visaStatus')}}</option>--}}
{{--                                                                <option value="visit" @if(auth()->user()->visa_status == 'visit') selected @endif>{{trans('web.visaStatus')}}</option>--}}
{{--                                                            </select>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}

                                                    <div class="col-12 row form-content">
{{--                                                        <div class="col-12 row mt-2">--}}
{{--                                                            <input type="checkbox" name="hide" id="hide" value="hide"> <label for="hide" class="pl-1"> {{trans('web.hide')}}:</label>--}}
{{--                                                        </div>--}}

                                                        <div class="col-12 row">
                                                            <h4>{{trans('web.yourCv')}}</h4>
                                                        </div>

                                                        <div class="col-12 row mt-1 mb-4">
                                                            <label for="cv"><i class="far fa-file-alt fa-4x text-muted pr-3"></i></label>
                                                            <input type="file" name="cv"  class=" myinput" id="cv" value="{{auth()->user()->cv}}">
                                                        </div>
                                                    </div>

                                                    <div class="col-12">
                                                        <select name="academic" id="academic" class="form-control myinput full-input">
                                                            <option value="" selected>{{trans('web.myHighestAcademicAchievementsIs')}}:</option>
                                                            <option value="n/a" @if(auth()->user()->academic == 'n/a') selected @endif>{{trans('web.highSchoolSecondary')}}</option>
                                                            <option value="high-school" @if(auth()->user()->academic == 'high-school') selected @endif>{{trans('web.highSchoolSecondary')}}</option>
                                                            <option value="bachelors-degree" @if(auth()->user()->academic == 'bachelors-degree') selected @endif>{{trans('web.mastersDegree')}}
                                                            <option value="Masters-degree" @if(auth()->user()->academic == 'Masters-degree') selected @endif>{{trans('web.mastersDegree')}}</option>
                                                            <option value="phd" @if(auth()->user()->academic == 'phd') selected @endif>{{trans('web.phD')}}</option>
                                                        </select>
                                                    </div>

                                                    <div class="col-12">
                                                        <h4 class="mt-3 mb-2">Your CV Summary</h4>
                                                        <textarea class="form-control myinput full-input"  name="summary_cv" placeholder="Write the summary of the latest years of your career. Make sure you use the keywords that describe your skills properly." id="summary_cv" cols="10" rows="10" >{{ auth()->user()->summary_cv }}</textarea>
                                                    </div>

                                                    <button type="submit" class="btn btn-danger mt-4 ml-3">{{trans('web.update')}}</button>

                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                {{--  --}}
                                <div class="col-md-4">
                                    <div class="widgets-column row text-center">
                                        <div class="col mycolumn">
                                            <p>My Ads</p>
                                            <strong>0</strong>
                                            <span>ads viewed <strong>22</strong> times</span>
                                        </div>
                                        <div class="col mycolumn">
                                            <p>My Favourites</p>
                                            <strong>0</strong>
                                            <span>ads saved</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                </div>

            </div>


@endsection
