@extends('layouts.app')
@section('content')
<div class="container">
	<div class="card">
		<div class="card-header"><h2>Select Month</h2>

		<form method="GET" action="/apartments/{{ $apartment->id }}">
			@csrf

			<div class="field">
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

			<div class="field is-grouped">
				<div class="control">
					<button class="btn btn-primary" type="submit">Submit</button>
				</div>
			</div>


		</form>

		</div>
	</div>
</div>




@endsection
