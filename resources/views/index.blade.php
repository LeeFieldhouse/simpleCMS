@extends('layouts.app')
@section('title')
Home
@endsection
@section('content')
<div class="container">
        <div class="row">
            <div class="col s12">
                <h2 class="center-align">Login</h2>
                <h4>test@test.com</h4>
                <h4>testing</h4>
                <div class="row">
                    <form class="col s12" method="POST" action="{{route('login')}}">
                        @csrf
                        <div class="row">
                            <div class="input-field col s12">
                                <input id="email" type="email" name="email" class="validate" value="{{old('email')}}">
                                <label for="email">Email</label>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12">
                                <input id="pass" type="password" name="password" class="validate">
                                <label for="pass">Password</label>
                                @if ($errors->has('password'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                            </div>
                        </div>


                        <div class="row">
                            <div class="col m12">
                                <p class="right-align">
                                    <button class="btn btn-large waves-effect waves-light" type="submit" name="action">Login</button>
                                </p>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
