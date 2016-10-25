@extends('layout')

@section('content')

	<div class="row">
		<div class="col-md-6 col-md-offset-3">

			<h1>Register</h1>

			<hr>

			<form method="POST" action="/register">

				{!! csrf_field() !!}

				<div class="form-group">
					<label for="name">Name:</label>
					<input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" required>
					<div class="text-danger">{{ $errors->first('name') }}</div>
				</div>

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
					<label for="password_confirmation">Confirm Password:</label>
					<input type="password" name="password_confirmation" id="password_confirmation" class="form-control" value="{{ old('password_confirmation') }}" required>
					<div class="text-danger">{{ $errors->first('password_confirmation') }}</div>
				</div>

			<button class="btn btn-default" type="submit">Register</button>
			
			</form>


		</div>
	</div>
	
@stop
