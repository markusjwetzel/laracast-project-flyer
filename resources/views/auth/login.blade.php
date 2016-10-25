@extends('layout')

@section('content')

	<div class="row">
		<div class="col-md-6 col-md-offset-3">

			<form method="POST" action="/login">

				{!! csrf_field() !!}

				<div class="form-group">
					<label for="email">Email:</label>
					<input type="text" name="email" id="email" class="form-control" value="{{ old('email') }}" required>
					<div class="text-danger">{{ $errors->first('email') }}</div>
				</div>

				<div class="form-group">
					<label for="password">Password:</label>
					<input type="password" name="password" id="password" class="form-control" value="{{ old('password') }}" required>
					<div class="text-danger">{{ $errors->first('password') }}</div>
				</div>

				<div class="form-group">
					<input type="checkbox" name="remember"> Remember Me
				</div>

				<div class="form-group">
					<button class="btn btn-default" type="submit">Login</button>
				</div>

			</form>

		</div>
	</div>
	
@stop
