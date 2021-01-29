@extends('layouts.app')

@section('content')
<div id="wrapper">
	<div id="page" class="container">
		<h1>New Expense</h1>
		<form method="POST" action="/expenses">
			@csrf

			<div class="field">
				<label class="label" for="name">Name</label>

				<div class="control">
					<input class="form-control @error('name') is-invalid @enderror" type="text" name="name" id="name">
					@error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
				</div>
			</div>

			<div class="field">
				<label class="label" for="amount">Amount</label>

				<div class="control">
					<input class="form-control @error('amount') is-invalid @enderror" type="number" name="amount" id="amount">
					@error('amount')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
				</div>
			</div>

			<div class="field">
				<label class="label" for="monthlyexpense">Month</label>

				<select id="monthlyexpense" type="select" class="form-control @error('monthlyexpense') is-invalid @enderror" name="monthlyexpense">
					@foreach($monthlyexpenses as $monthlyexpense)
					<option value="{{ $monthlyexpense->id }}">{{ $monthlyexpense->date }}</option>
					@endforeach
                </select>
                @error('monthlyexpense')
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
