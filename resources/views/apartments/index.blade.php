@extends('layouts.app')
@section('content')
<div class="container">
	<div class="card">
		<div class="card-header"><h2>Select Apartment</h2>

		<form method="GET" action="/apartments/{id}">

			<div class="form-group">
				<label class="label" for="apartment">Apartments</label>

				<select id="apartment" type="select" class="form-control @error('apartment') is-invalid @enderror" name="apartment">
					@foreach($apartments as $apartment)
					<option value="{{ $apartment->id }}">{{ $apartment->id }}</option>
					@endforeach
                </select>
                @error('apartment')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                @enderror
			</div>
			<button class="btn btn-primary" type="submit">Submit</button>
		</form>

		</div>
	</div>
</div>




@endsection
