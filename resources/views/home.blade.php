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
                    Fullname: {{$user->fullname}}<br>
                    Telephone Number: {{$user->tel_no}}<br>
                    Email: {{$user->email}}<br>
                    Flat Number: {{$user->flat_no}}<br>
                    Payment Type: {{$user->payment_type}}<br>
                </div>

                <div class="card-header"><h2>Your Apartment's Incomes</h2></div>
                <div class="card-body">
                    @foreach($user->apartment->monthlyincomes as $monthlyincome)
                    <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample{{ $monthlyincome->date }}" aria-expanded="false" aria-controls="collapseExample">
                        {{ $monthlyincome->date }}
                    </button><br>
                    <div class="collapse" id="collapseExample{{ $monthlyincome->date }}">
                      <div class="card card-body">
                        {{ $monthlyincome->totalincome }}
                      </div>
                    </div>
                    @endforeach
                </div>

                <div class="card-header"><h2>Your Apartment's Expenses</h2></div>
                <div class="card-body">
                    @foreach($user->apartment->monthlyexpenses as $monthlyexpense)
                    <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample{{ $monthlyexpense->date }}" aria-expanded="false" aria-controls="collapseExample">
                        {{ $monthlyexpense->date }}
                    </button><br>
                    <div class="collapse" id="collapseExample{{ $monthlyexpense->date }}">
                      <div class="card card-body">
                        @foreach($monthlyexpense->expenses as $expense)
                        Subject:{{ $expense->name }}, Amount:{{ $expense->amount }}<br>
                        @endforeach
                      </div>
                    </div>
                    @endforeach
                    <button type="button" class="btn btn-dark btn-block" onclick="location.href='{{ url('/expenses/create') }}'">Add Expense
                    </button>
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
