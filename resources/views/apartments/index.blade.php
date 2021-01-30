@extends('layouts.app')
@section('content')
<div class="container">

	<div class="card">
		<div class="card-header"><h2>All Apartments</h2></div>
		@foreach($apartments as $apartment)
		<div class="card-body">
			<table class="table">
				<tr>
					<th scope="col" style="text-align: center;">No</th>
					<th scope="col" style="text-align: center;">Total Flat</th>
					<th scope="col" style="text-align: center;">Total Flat</th>
					<th scope="col" style="text-align: center;">Actions</th>
				</tr>
				<tbody>
					<tr>
						<th style="text-align: center;">{{ $apartment->id }}</th>
						<th style="text-align: center;">{{ $apartment->flat_total }}</th>
						<th style="text-align: center;">{{ $apartment->floor_total }}</th>
						<th>
							<button style="margin-left: 300px" class="btn btn-primary" onclick="location.href='{{ url('/apartments/' . $apartment->id) }}'">
     						Due Details</button>
						</th>
					</tr>
				</tbody>
			</table>
		</div>
        @endforeach
	</div>
</div>




@endsection
