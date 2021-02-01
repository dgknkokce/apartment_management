@extends('layouts.app')
@section('content')
<div class="container">

<div class="card">
	<div class="card-header"><h2>Due Info</h2></div>
		<div class="card-body" >
			@foreach($wanteddues as $wanteddue)
			<table class="table" id="table">
				<tr>
					<th scope="col" style="text-align: center;">Full Name</th>
					<th scope="col" style="text-align: center;">Apartment</th>
					<th scope="col" style="text-align: center;">Amount</th>
					<th scope="col" style="text-align: center;">Appointed Date<br><b class="text-muted">Month/Year</b></th>
					@if($wanteddue->status === 1)
					<th scope="col" style="text-align: center;">Payed Date<br><b class="text-muted">Day/Month/Year</b></th>
					@endif
					@if($wanteddue->status === 0)
					<th scope="col" style="text-align: center;">Actions</th>
					@endif
				</tr>
				<tbody>
					<tr>
						<th style="text-align: center;">{{ $wanteddue->user->fullname }}</th>
						<th style="text-align: center;">{{ $wanteddue->user->apartment_id }}</th>
						<th style="text-align: center;">{{ $wanteddue->amount }}</th>
						<th style="text-align: center;">{{ $wanteddue->monthlyincome->date }}/{{ $wanteddue->created_at->format('Y') }}</th>
						@if($wanteddue->status === 1)
						<th style="text-align: center;">{{ $wanteddue->updated_at->format('m/Y')}}</th>
						@endif
						@if($wanteddue->status === 0)
						<th style="text-align: center;">
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
