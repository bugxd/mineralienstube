@extends('layouts.user')

@section('title')

<title>Mineralienstube</title>

@endsection

@section('css')

// your css

@endsection

@section('scripts')

// your javascript

@endsection


@section('content')
<h1>Login</h1>

@if(Session::has('fail'))
    <div class="alert alert-danger">
        {{  Session::get('fail') }}
    </div>
@endif

<form role="form" method="post" action="{{  URL::route('postLogin') }}">
    <div class="form-group {{  $errors->has('username') ? ' has-error' : ''}}">
        <label for="username">Username: </label>
        <input id="username" name="username" type="text" class="form-control" {{Input::old('username') ? ' value"'.Input::old('username').'"' : ''}}/>
        @if($errors->has('username'))
            {{  $errors->first('username') }}
        @endif
    </div>
    <div class="form-group {{  $errors->has('password') ? ' has-error' : ''}}">
        <label for="password">Password: </label>
        <input id="password" name="password" type="password" class="form-control" {{Input::old('password') ? ' value"'.Input::old('password').'"' : ''}}/>
        @if($errors->has('password'))
            {{  $errors->first('password') }}
        @endif
    </div>
    <div class="chekbox">
        <label for="remember">
            <input type="checkbox" name="remember" id="remember" />
            Remember me
        </label>
    </div>
    {{  Form::token() }}<!--used for csrf-->
    <div class="form-goup">
        <input type="submit" value="Login" class="btn btn-default pull-right"/>
    </div>
</form>
@endsection