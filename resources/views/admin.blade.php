@extends('layouts.app')

@section('content')

<div class="container">
	<div class="card">
		<div class="card-header"><h2>Dear Admin</h2></div>
		<div class="card-body">
            <button type="button" class="btn btn-primary" onclick="location.href='{{ url('dues') }}'">Manage Dues
            </button>

            @if ($authuser->role_id === 1)
            <button type="button" class="btn btn-primary" onclick="location.href='{{ url('/users/create') }}'">Add User
            </button>
            @endif
        </div>
	</div>
	<div class="card">
		<div class="card-header"><h2>All Users</h2></div>
		@foreach($users as $user)
		<div class="card-body">
			<table class="table">
				<tr>
					<th scope="col">Full Name</th>
					<th scope="col">Email</th>
					<th scope="col">Apartment</th>
					<th scope="col">Flat No</th>
					<th scope="col">Join Date</th>
					<th scope="col">Actions</th>
				</tr>
				<tbody>
					<tr>
						<th>{{ $user->fullname }}</th>
						<th>{{ $user->email }}</th>
						<th>{{ $user->apartment_id }}</th>
						<th>{{ $user->flat_no }}</th>
						<th>{{ $user->created_at }}</th>
						<th>
							<form method="POST" action="/users/{{$user->id}}">
								<input class="btn btn-danger btn-sm" type="submit" value="Move Out"/>
								@method('DELETE')
								@csrf
							</form>
							<form method="GET" action="/users/{{$user->id}}/edit">
								<input class="btn btn-primary" type="submit" value="Edit"/>
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
