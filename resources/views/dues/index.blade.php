@extends('layouts.app')

@section('content')

<div class="container">
	<div class="card">
		<div class="card-header"><h2>Unpayed Dues</h2></div>
		@foreach($unpayeddues as $unpayeddue)
		<div class="card-body">
			<table class="table">
				<tr>
					<th scope="col">Full Name</th>
					<th scope="col">Amount</th>
					<th scope="col">Date</th>
					<th scope="col">Actions</th>
				</tr>
				<tbody>
					<tr>
						<th>{{ $unpayeddue->user->fullname }}</th>
						<th>{{ $unpayeddue->amount }}</th>
						<th>{{ $unpayeddue->monthlyincome->date }}</th>
						<th>
							<form method="POST" action="/dues/{{$unpayeddue->id}}">
								@method('PUT')
								@csrf
								<input class="btn btn-danger btn-sm" type="submit" value="Pay Due"/>
							</form>
						</th>
					</tr>
				</tbody>
			</table>
		</div>
        @endforeach
	</div>
</div>




@endsection
