@extends('layouts.app')

@section('content')

<div class="container">
	<div class="card">


		<script>
			window.onload = function() {

			var chart = new CanvasJS.Chart("chartContainer", {
				animationEnabled: true,
				title: {
					text: "Due Chart of Months - 2021"
				},
				data: [{
					type: "pie",
					startAngle: 240,
					yValueFormatString: "##0.00\"%\"",
					indexLabel: "{label} {y}",
					dataPoints: [
						{y: {{$totalPayeddue}}/100, label: "Payed"},
						{y: {{$totalUnpayeddue}}/100, label: "Unpayed"},
					]
				}]
			});
			chart.render();
		}
		</script>
		<div id="chartContainer" style="height: 370px; width: 100%;"></div>
		<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>

		<div class="card-header"><h2>Unpayed Dues</h2></div>
		<div class="card-body">
			@foreach($unpayeddues as $unpayeddue)
			<table class="table">
				<tr>
					<th scope="col">Full Name</th>
					<th scope="col">Apartment</th>
					<th scope="col">Amount</th>
					<th scope="col">Date</th>
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
								<input class="btn btn-danger btn-sm" type="submit" value="Pay Due"/>
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
