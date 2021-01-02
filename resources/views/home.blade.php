@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h2>{{ __('Dashboard') }}</h2></div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}, {{Auth::user()->fullname}}
                </div>

                @if ($user->role_id === 1)
                    <div class="card-header"><h2>Only For Admins</h2></div>
                    <div class="card-body">
                        <button type="button" class="btn btn-dark btn-block" onclick="location.href='{{ url('admin') }}'">Admin Panel
                        </button>
                    </div>
                @endif

                <div class="card-header"><h2>Your Information</h2></div>
                <div class="card-body">
                    Your telephone number: {{$user->tel_no}}<br>
                    Your email: {{$user->email}}<br>
                    Your flat number: {{$user->flat_no}}<br>
                    Your payment type: {{$user->payment_type}}<br>
                </div>

                <div class="card-header"><h2>Your Apartment's Incomes</h2></div>
                <div class="card-body">
                    @foreach($user->apartment->incomes as $income)
                    Your apartment's income {{ $income->amount }}, Subject: {{ $income->incometype->subject }}, Date: {{$income->created_at}}</br>
                    @endforeach
                </div>

                <div class="card-header"><h2>Your Apartment's Expenses</h2></div>
                <div class="card-body">
                    @foreach($user->apartment->expenses as $expense)
                    Your apartment's expense {{ $expense->amount }}, Subject: {{ $expense->expensetype->subject }}, Date: {{$expense->created_at}}</br>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
    <script>
    var msg = '{{Session::get('alert')}}';
    var exist = '{{Session::has('alert')}}';
    if(exist){
      alert(msg);
    }
  </script>
</div>
@endsection
