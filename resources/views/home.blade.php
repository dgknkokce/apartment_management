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

                <div class="card">
                    <div class="card-header"><h2>Announcements</h2>
                        @if ($user->role_id === 1)
                        <button type="button" class="btn btn-primary" onclick="location.href='{{ url('/announcements/create') }}'">Add Announcement
                        </button>
                        @endif
                    </div>
                        <div class="card-body">
                            @foreach($announcements as $announcement)
                            @if($announcement->apartment_id === $user->apartment_id)
                            <table class="table">
                                    <tr>
                                        <th scope="col">Subject</th>
                                        <th scope="col">Date</th>
                                        @if($user->role_id === 1)
                                        <th scope="col">Actions</th>
                                        @endif
                                    </tr>
                                <tbody>
                                    <tr>
                                        <th>{{ $announcement->subject }}</th>
                                        <th>{{ $announcement->created_at }}</th>
                                        @if($user->role_id === 1)
                                        <th>
                                            <form method="POST" action="/announcements/{{$announcement->id}}">
                                                @method('PUT')
                                                @csrf
                                                <input class="btn btn-primary" type="submit" value="Mark as DONE"/>
                                            </form>
                                        </th>
                                        @endif
                                    </tr>
                                </tbody>
                            </table>
                            @endif
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header"><h2>Your Information</h2></div>
                    <div class="card-body">

                        <table class="table">
                                <tr>
                                    <th scope="col">Fullname</th>
                                    <th scope="col">Telephone Number</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Apartment</th>
                                    <th scope="col">Flat Number</th>
                                    <th scope="col">Payment Type</th>
                                </tr>
                            <tbody>
                                <tr>
                                    <th>{{$user->fullname}}</th>
                                    <th>{{$user->tel_no}}</th>
                                    <th>{{$user->email}}</th>
                                    <th>{{$user->apartment_id}}</th>
                                    <th>{{$user->flat_no}}</th>
                                    <th>{{$user->payment_type}}</th>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header"><h2>Your Unpayed Dues</h2></div>
                    @foreach($unpayeddues as $unpayeddue)
                    <div class="card-body">
                        @if($unpayeddue->user_id === $user->id)
                        <table class="table">
                            <tr>
                                <th scope="col">Amount</th>
                                <th scope="col">Month</th>
                            </tr>
                            <tbody>
                                <tr>
                                    <th>{{ $unpayeddue->amount }}</th>
                                    <th>{{ $unpayeddue->monthlyincome->date }}</th>
                                </tr>
                            </tbody>
                        </table>
                        @endif
                    </div>
                    @endforeach
                </div>


                <div class="card">
                    <div class="card-header"><h2>Your Apartment's Incomes</h2></div>
                    <div class="card-body">
                        @foreach($monthlyincomes as $monthlyincome)
                        <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample{{ $monthlyincome->date }}" aria-expanded="false" aria-controls="collapseExample">
                           Month {{ $monthlyincome->date }}
                        </button><br>
                        <div class="collapse" id="collapseExample{{ $monthlyincome->date }}">
                          <div class="card card-body">
                            {{ $monthlyincome->totalincome }}
                          </div>
                        </div>
                        @endforeach
                    </div>
                </div>

                <div class="card">
                    <div class="card-header"><h2>Your Apartment's Expenses</h2>
                    @if ($user->role_id === 1)
                    <button type="button" class="btn btn-dark btn-block" onclick="location.href='{{ url('/expenses/create') }}'">Add Expense
                    </button>
                    @endif
                    </div>
                    <div class="card-body">
                        @foreach($user->apartment->monthlyexpenses as $monthlyexpense)
                        <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample{{ $monthlyexpense->date }}" aria-expanded="false" aria-controls="collapseExample">
                            Month {{ $monthlyexpense->date }}
                        </button><br>
                        <div class="collapse" id="collapseExample{{ $monthlyexpense->date }}">
                          <div class="card card-body">
                            @foreach($monthlyexpense->expenses as $expense)
                            Subject:{{ $expense->name }}, Amount:{{ $expense->amount }}<br>
                            @endforeach
                          </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
