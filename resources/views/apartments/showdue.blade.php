@extends('layouts.app')
@section('content')
<div class="container">

<div class="card">
	<div class="card-header"><h2>Due Info</h2></div>
		<div class="card-body" >
			@foreach($wanteddues as $wanteddue)
			<table class="table" id="table">
				<tr>
					<th scope="col">Full Name</th>
					<th scope="col">Apartment</th>
					<th scope="col">Amount</th>
					<th scope="col">Month</th>
					@if($wanteddue->status === 1)
					<th scope="col">Payed Date</th>
					@endif
					@if($wanteddue->status === 0)
					<th scope="col">Actions</th>
					@endif
				</tr>
				<tbody>
					<tr>
						<th>{{ $wanteddue->user->fullname }}</th>
						<th>{{ $wanteddue->user->apartment_id }}</th>
						<th>{{ $wanteddue->amount }}</th>
						<th>{{ $wanteddue->monthlyincome->date }}</th>
						@if($wanteddue->status === 1)
						<th>{{ $wanteddue->updated_at->format('m/Y')}}</th>
						@endif
						@if($wanteddue->status === 0)
						<th>
							<form method="POST" action="/dues/{{$wanteddue->id}}">
								@method('PUT')
								@csrf
								<input class="btn btn-primary" id="Paybutton" type="submit" value="Pay Due"/>
							</form>
						</th>
						@endif
					</tr>
				</tbody>
			</table>
			@endforeach
		</div>
</div>
<button type="button" class="btn btn-primary" onclick="location.href='{{ url('/apartments') }}'">Go Back
</button>

</div>




@endsection
