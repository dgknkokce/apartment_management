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
			Fullname: {{$user->fullname}}<br>
            Telephone Number: {{$user->tel_no}}<br>
            Email: {{$user->email}}<br>
            Flat Number: {{$user->flat_no}}<br>
            Payment Type: {{$user->payment_type}}<br>

            @if($user->dues->amount === 0)
            	Monthly Due Check: Not Payed
            @else
            	Monthly Due Check: Payed
            @endif
		</div>
        @endforeach
	</div>
</div>




@endsection
