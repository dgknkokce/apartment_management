@extends('layouts.app')

@section('content')
<div id="wrapper">
	<div id="page" class="container">
		<h1>New Unpayed Due</h1>
		<form method="POST" action="/dues">
			@csrf

			<div class="field">
				<label class="label" for="apartment">Apartment</label>

				<div class="control">
					<select id="apartment" type="select" class="form-control @error('apartment') is-invalid @enderror" name="apartment" value="{{ $authuser->apartment_id }}">
                        @foreach($apartments as $apartment)
                        <option value="{{$apartment->id}}" id="{{$apartment->id}}">{{$apartment->id}}</option>
                        @endforeach
                    </select>

					@error('apartment')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
				</div>
			</div>

			<div class="field">
				<label class="label" for="amount">Amount</label>

				<div class="control">
					<input class="form-control @error('amount') is-invalid @enderror" type="number" name="amount" id="amount" min="1">
					@error('amount')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
				</div>
			</div>

			<div class="field">
				<label class="label" for="monthlyincome">Month</label>

				<select id="monthlyincome" type="select" class="form-control @error('monthlyincome') is-invalid @enderror" name="monthlyincome">
					@foreach($authuser->apartment->monthlyincomes as $monthlyincome)
					<option value="{{ $monthlyincome->date }}">{{ $monthlyincome->date }}</option>
					@endforeach
                </select>
                @error('monthlyincome')
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

@endsection
