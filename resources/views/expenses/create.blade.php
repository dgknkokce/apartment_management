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
					<input class="input" type="text" name="name" id="name">
				</div>
			</div>

			<div class="field">
				<label class="label" for="amount">Amount</label>

				<div class="control">
					<input class="input" type="number" name="amount" id="amount">
				</div>
			</div>

			<div class="field">

				<select id="monthlyexpense" type="select" class="form-control @error('monthlyexpense') is-invalid @enderror" name="monthlyexpense">
					@foreach($user->apartment->monthlyexpenses as $monthlyexpense)
					<option name="{{$monthlyexpense->id}}" id="{{$monthlyexpense->id}}">{{ $monthlyexpense->date }}</option>
					@endforeach
                </select>
			</div>

			<div class="field is-grouped">
				<div class="control">
					<button class="button is-link" type="submit">Submit</button>
				</div>
			</div>


		</form>
	</div>
</div>

@endsection
