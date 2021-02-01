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
                                        <th scope="col" style="text-align: center;">Subject</th>
                                        <th scope="col" style="text-align: center;">Date</th>
                                        @if($user->role_id === 1)
                                        <th scope="col" style="text-align: center;">Actions</th>
                                        @endif
                                    </tr>
                                <tbody>
                                    <tr>
                                        <th style="text-align: center;">{{ $announcement->subject }}</th>
                                        <th style="text-align: center;">{{ $announcement->created_at->format('d/m/Y') }}</th>
                                        @if($user->role_id === 1)
                                        <th style="text-align: center;">
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
                                    <th scope="col" style="text-align: center;">Fullname</th>
                                    <th scope="col" style="text-align: center;">Telephone Number</th>
                                    <th scope="col" style="text-align: center;">Email</th>
                                    <th scope="col" style="text-align: center;">Apartment</th>
                                    <th scope="col" style="text-align: center;">Flat Number</th>
                                    <th scope="col" style="text-align: center;">Payment Type</th>
                                </tr>
                            <tbody>
                                <tr>
                                    <th style="text-align: center;">{{$user->fullname}}</th>
                                    <th style="text-align: center;">{{$user->tel_no}}</th>
                                    <th style="text-align: center;">{{$user->email}}</th>
                                    <th style="text-align: center;">{{$user->apartment_id}}</th>
                                    <th style="text-align: center;">{{$user->flat_no}}</th>
                                    <th style="text-align: center;">{{$user->payment_type}}</th>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header"><h2>Your Unpayed Dues</h2></div>

                    <div class="card-body" style="overflow:scroll; height:320px;">
                        @foreach($unpayeddues as $unpayeddue)
                        @if($unpayeddue->user_id === $user->id)
                        <table class="table">
                            <tr>
                                <th scope="col" style="text-align: center;">Amount</th>
                                <th scope="col" style="text-align: center;">Appointed Date<br><b class="text-muted">Month/Year</b></th>
                            </tr>
                            <tbody>
                                <tr>
                                    <th style="text-align: center;">{{ $unpayeddue->amount }}</th>
                                    <th style="text-align: center;">{{ $unpayeddue->monthlyincome->date }}/{{ $unpayeddue->created_at->format('Y') }}</th>
                                </tr>
                            </tbody>
                        </table>
                        @endif
                        @endforeach
                    </div>

                </div>
                <div class="card">
                    <div class="card-header"><h2>Your Payed Dues</h2></div>

                    <div class="card-body" style="overflow:scroll; height:320px;">
                        @foreach($payeddues as $payeddue)
                        @if($payeddue->user_id === $user->id)
                        <table class="table">
                            <tr>
                                <th scope="col" style="text-align: center;">Amount</th>
                                <th scope="col" style="text-align: center;">Appointed Date<br><b class="text-muted">Month/Year</b></th>
                                <th scope="col" style="text-align: center;">Paid Date<br><b class="text-muted">Day/Month/Year</b></th>
                            </tr>
                            <tbody>
                                <tr>
                                    <th style="text-align: center;">{{ $payeddue->amount }}</th>
                                    <th style="text-align: center;">{{ $payeddue->monthlyincome->date }}/{{ $payeddue->created_at->format('Y') }}</th>
                                    <th style="text-align: center;">{{ $payeddue->updated_at->format('d/m/Y') }}</th>
                                </tr>
                            </tbody>
                        </table>
                        @endif
                        @endforeach
                    </div>
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
                            Subject:{{ $expense->name }}, &nbsp; Amount:{{ $expense->amount }}<br>
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
