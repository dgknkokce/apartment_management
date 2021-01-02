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
		<div class="card-body">
			<ul class="list-group">
				@foreach($users as $user)
					<li class="list-group-item">{{ $user->fullname }}</br></li>
	            @endforeach
			</ul>
        </div>
	</div>
</div>




@endsection
