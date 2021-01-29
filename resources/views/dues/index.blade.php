@extends('layouts.app')

@section('content')


<script src="https://www.gstatic.com/charts/loader.js"></script>
<script>
    google.charts.load('current', {packages: ['corechart']});
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
      // Define the chart to be drawn.
      var data = new google.visualization.DataTable();
      data.addColumn('string', 'Element');
      data.addColumn('number', 'Percentage');
      data.addRows([
        ['Payed', {{$totalPayeddue}}],
        ['Unpayed', {{$totalUnpayeddue}}]
      ]);

      // Instantiate and draw the chart.
      var chart = new google.visualization.PieChart(document.getElementById('myPieChart'));
      chart.draw(data, null);
    }
</script>



<div class="container">
	<div class="card">

		<div class="card-header"><h2>Unpayed Dues</h2>
			@if ($user->role_id === 1)
            <button type="button" class="btn btn-primary" onclick="location.href='{{ url('/dues/create') }}'">Add Unpayed Due
            </button>
            @endif
		</div>
		<div class="card-body">
			<div class="row justify-content-center">
		        <div id='myPieChart'></div>
		    </div>
			<div id="myPieChart"/>
			@if ($user->role_id === 1)
			<button type="button" class="btn btn-primary" onclick="location.href='{{ url('/apartments') }}'">Show Details
            </button>
            @endif
		</div>



		<div class="card-header"><h2>Unpayed Dues</h2></div>
		<div class="card-body" >
			@foreach($unpayeddues as $unpayeddue)
			<table class="table" id="table">
				<tr>
					<th scope="col">Full Name</th>
					<th scope="col">Apartment</th>
					<th scope="col">Amount</th>
					<th scope="col">Month</th>
					<th scope="col">Actions</th>
				</tr>
				<tbody>
					<tr>
						<th>{{ $unpayeddue->user->fullname }}</th>
						<th>{{ $unpayeddue->user->apartment_id }}</th>
						<th>{{ $unpayeddue->amount }}</th>
						<th>{{ $unpayeddue->monthlyincome->date }}</th>
						<th>
							<form method="POST" action="/dues/{{$unpayeddue->id}}">
								@method('PUT')
								@csrf
								<input class="btn btn-primary" id="Paybutton" type="submit" value="Pay Due"/>
							</form>
						</th>
					</tr>
				</tbody>
			</table>
			@endforeach
		</div>
	</div>
</div>


@endsection
