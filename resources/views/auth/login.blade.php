@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">

            @if (session('success'))
                <div class="alert alert-success">
                    {{session('success')}}
                </div>
            @endif

            <div class="card mycard">
                <a href="{{ route('home') }}" class="esc">x</a>
                <h3 class="align-center text-center"> {{trans('web.LogInWithYourAmail')}} </h3>
                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="form-group row">
                            <div class="col-md-8 offset-md-2">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>
                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-8 offset-md-2">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-2 text-center">
                                @if (Route::has('password.request'))
                                    <a class="btn btn-link mylink" href="{{ route('password.request') }}">
                                      {{trans('web.forgotYourPassword')}}
                                    </a>
                                @endif
                                <br>
                                    <a class="btn btn-link mylink" href="{{ route('register') }}">
                                         {{trans('web.registerANewAccount')}}
                                    </a>
                                     <br>
                                 <button type="submit" class="btn btn-danger col-md-12 mt-3" >
                                   {{trans('web.logIn')}}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
