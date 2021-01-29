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
					<th scope="col" style="text-align: center;">Full Name</th>
					<th scope="col" style="text-align: center;">Email</th>
					<th scope="col" style="text-align: center;">Apartment</th>
					<th scope="col" style="text-align: center;">Flat No</th>
					<th scope="col" style="text-align: center;">Join Date</th>
					<th scope="col" style="text-align: center;">Actions</th>
				</tr>
				<tbody>
					<tr>
						<th style="text-align: center;">{{ $user->fullname }}</th>
						<th style="text-align: center;">{{ $user->email }}</th>
						<th style="text-align: center;">{{ $user->apartment_id }}</th>
						<th style="text-align: center;">{{ $user->flat_no }}</th>
						<th style="text-align: center;">{{ $user->created_at }}</th>
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
	<div class="card">
		<div class="card-header"><h2>Moved Out Users</h2></div>
		@foreach($oldusers as $olduser)
		<div class="card-body">
			<table class="table">
				<tr>
					<th scope="col" style="text-align: center;">Full Name</th>
					<th scope="col" style="text-align: center;">Email</th>
					<th scope="col" style="text-align: center;">Apartment</th>
					<th scope="col" style="text-align: center;">Join Date</th>
					<th scope="col" style="text-align: center;">Moved Out Date</th>
					<th scope="col" style="text-align: center;">Remaning Dues And It's Date</th>
				</tr>
				<tbody>
					<tr>
						<th class="text-muted" style="text-align: center;">{{ $olduser->fullname }}</th>
						<th class="text-muted" style="text-align: center;">{{ $olduser->email }}</th>
						<th class="text-muted" style="text-align: center;">{{ $olduser->apartment_id }}</th>
						<th class="text-muted" style="text-align: center;">{{ $olduser->created_at->format('m/Y') }}</th>
						<th class="text-muted" style="text-align: center;">{{ $olduser->updated_at->format('m/Y') }}</th>
						@foreach($unpayeddues as $unpayeddue)
						@if($unpayeddue->user_id === $olduser->id)
							<th class="text-muted" style="text-align: center;">
								Amount: &nbsp;{{ $unpayeddue->amount }}<br>
								Date: &nbsp;{{ $unpayeddue->monthlyincome->created_at->format('m/Y') }}
							</th>
						@endif
						@endforeach
					</tr>
				</tbody>
			</table>
		</div>
        @endforeach
	</div>
</div>




@endsection
