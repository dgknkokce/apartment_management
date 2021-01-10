@extends('layouts.app')

@section('content')

<div class="container">
	<div class="card">
		<div class="card-header"><h2>Dear Admin</h2></div>
		<div class="card-body">
            <p>This is your admin panel. You can and do other users can't. So may the force be with you. :)</p>
        </div>
	</div>
	<div class="card">
		<div class="card-header"><h2>All Users(including YOU)</h2></div>
		@foreach($users as $user)
		<div class="card-body">
			<table class="table">
				<tr>
					<th scope="col">Full Name</th>
					<th scope="col">Email</th>
					<th scope="col">Flat No</th>
					<th scope="col">Join Date</th>
					<th scope="col">Actions</th>
				</tr>
				<tbody>
					<tr>
						<th>{{ $user->fullname }}</th>
						<th>{{ $user->email }}</th>
						<th>{{ $user->flat_no }}</th>
						<th>{{ $user->created_at }}</th>
						<th>
							<form method="POST" action="/users/{{$user->id}}">
								<input class="btn btn-danger btn-sm" type="submit" value="Delete"/>
								@method('DELETE')
								@csrf
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
