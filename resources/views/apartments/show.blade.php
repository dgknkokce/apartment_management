@extends('layouts.app')
@section('content')
<div class="container">

<form method="PUT" action="/apartments/showDues">
	@method('POST')
	@csrf
  	<div class="form-group">
	    <label for="selectMonth">Select Month</label>
	    <select class="form-control" id="selectMonth" name="month">
	    	@foreach($monthlyincomes as $monthlyincome)
	      		<option id="month" value="{{ $monthlyincome->id }}">{{ $monthlyincome->date }}</option>
	      	@endforeach
	    </select>
  	</div>
  	<div class="form-group">
	    <label for="year">Select Year</label>
	    <select class="form-control" id="year" name="year">
	      	<option id="year" value="2021">2021</option>
	      	<option id="year" value="2022">2022</option>
	      	<option id="year" value="2023">2023</option>
	      	<option id="year" value="2024">2024</option>
	    </select>
  	</div>
  	<div class="form-group">
	    <label for="selectstatus">Select Status</label>
	    <select class="form-control" id="status" name="status">
	      	<option id="status" value="1">Payed</option>
	      	<option id="status" value="0">Unpayed</option>
	    </select>
  	</div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>

</div>




@endsection
