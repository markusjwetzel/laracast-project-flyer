@inject('countries', 'App\Http\Utilities\Country')

{{ csrf_field() }}

<div class="row">

	<div class="col-md-6">

		<div class="form-group">
			<label for="street">Street:</label>
			<input type="text" name="street" id="street" class="form-control" value="{{ old('street') }}" required>
			<div class="text-danger">{{ $errors->first('street') }}</div>
		</div>

		<div class="form-group">
			<label for="city">City:</label>
			<input type="text" name="city" id="city" class="form-control" value="{{ old('city') }}" required>
			<div class="text-danger">{{ $errors->first('city') }}</div>
		</div>

		<div class="form-group">
			<label for="zip">Zip/Postal Code:</label>
			<input type="text" name="zip" id="zip" class="form-control" value="{{ old('zip') }}" required>
			<div class="text-danger">{{ $errors->first('zip') }}</div>
		</div>

		<div class="form-group">
			<label for="country">Country:</label>
			<select id="country" name="country" class="form-control" required>
				@foreach( $countries::all() as $country => $code )
					<option value="{{ $code }}">{{ $country }}</option>
				@endforeach
			</select>
			<div class="text-danger">{{ $errors->first('country') }}</div>
		</div>

		<div class="form-group">
			<label for="state">State:</label>
			<input type="text" name="state" id="state" class="form-control" value="{{ old('state') }}" required>
			<div class="text-danger">{{ $errors->first('state') }}</div>
		</div>

	</div>

	<div class="col-md-6">

		<div class="form-group">
			<label for="price">Sale Price:</label>
			<input type="text" name="price" id="price" class="form-control" value="{{ old('price') }}" required>
			<div class="text-danger">{{ $errors->first('price') }}</div>
		</div>

		<div class="form-group">
			<label for="description">Home Description:</label>
			<textarea id="description" name="description" class="form-control" rows="10" required>{{ old('description') }}</textarea>
			<div class="text-danger">{{ $errors->first('description') }}</div>
		</div>

	
	</div>

	<div class="col-md-12">	
		<hr>
		<div class="form-group">
			<button type="submit" class="btn btn-primary">Create Flyer</button>
		</div>
	</div>

</div>