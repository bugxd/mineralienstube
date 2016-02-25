@extends('layouts.user')

@section('title')

<title>Mineralienstube</title>

@endsection

@section('css')

<!--your css-->

@endsection

@section('scripts')

<!--your javascript-->

@endsection


@section('content')
<h1>Registration</h1>

<form role="form" method="post" action="{{  URL::route('postCreate') }}">
	<div class="form-group {{  $errors->has('email') ? ' has-error' : ''}}">
		<label for="email">Email: </label>
		<input id="email" name="email" type="email" class="form-control" {{Input::old('email') ? ' value"'.Input::old('email').'"' : ''}}/>
		@if($errors->has('email'))
			{{  $errors->first('email') }}
		@endif
	</div>
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
	<div class="form-group {{  $errors->has('confpassword') ? ' has-error' : ''}}">
		<label for="confpassword">Confirm Password: </label>
		<input id="confpassword" name="confpassword" type="password" class="form-control" {{Input::old('confpassword') ? ' value"'.Input::old('confpassword').'"' : ''}}/>
		@if($errors->has('confpassword'))
			{{  $errors->first('confpassword') }}
		@endif
	</div>
	{{  Form::token() }}<!--used for csrf-->
	<div class="form-goup">
		<input type="submit" value="Register" class="btn btn-default"/>
	</div>
</form>
@endsection