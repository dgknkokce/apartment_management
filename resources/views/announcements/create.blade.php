@extends('layouts.app')

@section('content')
<div id="wrapper">
	<div id="page" class="container">
		<h1>New Announcement</h1>
		<form method="POST" action="/announcements">
			@csrf

			<div class="field">
				<label class="label" for="apartment">Apartment</label>

				<div class="control">
					<select id="apartment" type="select" class="form-control @error('apartment') is-invalid @enderror" name="apartment" value="{{ $authuser->apartment_id }}">
                        @foreach($apartments as $apartment)
                        <option value="{{$apartment->id}}" id="{{$apartment->id}}">{{$apartment->id}}</option>
                        @endforeach
                    </select>

					@error('apartment')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
				</div>
			</div>

			<div class="field">
				<label class="label" for="subject">Subject</label>

				<div class="control">
					<textarea class="form-control @error('subject') is-invalid @enderror" type="number" name="subject" id="subject" rows="3">
					</textarea>
					@error('subject')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
				</div>
			</div>

			<div class="field is-grouped">
				<div class="control">
					<button class="btn btn-primary" type="submit">Submit</button>
				</div>
			</div>


		</form>
	</div>
</div>

@endsection
