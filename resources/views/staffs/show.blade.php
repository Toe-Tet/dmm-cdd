
@section('style')

@endsection

@section('content')

	<div class="card custom-card" style="padding-bottom: 20px;">

		<h5 style="padding-left: 20px; padding-top: 5px;"><b>Staff Detail</b></h5>
		<hr>
		<div class="row">
			<div class="col-md-8">
{{-- 				<div class="container">
					<div class="col-md-12 row" style="margin-top: 10px;">
						<div class="col-md-6 col-6">
							<p><b>STAFF-ID</b></p>
						</div>
						<div class="col-md-6 col-6">
							<p style="border: 1px solid #5a6268; width: 100px; padding: 3px; text-align: center"><b>S{{ $staff->id }}</b></p>
						</div>
					</div>
				</div> --}}

				<div class="container">
					<div class="col-md-12 row">
						<div class="col-md-6 col-6">
							<p>Full Name:</p>
						</div>
						<div class="col-md-6 col-6">
							<p class="">{{ $staff->full_name }} {{ $staff->gate ? '( '.$staff->gate.' )' : '' }}</p>
						</div>
					</div>
				</div>

				<div class="container">
					<div class="col-md-12 row">
						<div class="col-md-6 col-6">
							<p>Login Name:</p>
						</div>
						<div class="col-md-6 col-6">
							<p>{{ $staff->login_name }}</p>
						</div>
					</div>
				</div>

				<div class="container">
					<div class="col-md-12 row">
						<div class="col-md-6 col-6">
							<p>Phone No:</p>
						</div>
						<div class="col-md-6 col-6">
							<p>{{ $staff->phone_no }}</p>
						</div>
					</div>
				</div>

				<div class="container">
					<div class="col-md-12 row">
						<div class="col-md-6 col-6">
							<p>Address:</p>
						</div>
						<div class="col-md-6 col-6">
							<p>{!! $staff->address ? $staff->address : '<i style="color: gray">No Address..</i>' !!}</p>
						</div>
					</div>
				</div>

				<div class="container">
					<div class="col-md-12 row">
						<div class="col-md-6 col-6">
							<p>Registered At:</p>
						</div>
						<div class="col-md-6 col-6">
							<p>{{ $staff->created_at->format("d-m-Y h:i A") }}</p>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="container" align="center">
					<br>
					<img src='{{ $staff->photo ? "/".$staff->photo : "/assets/images/default/staff_profile.png" }}' style="max-width: 150px;">
					<br>
					<br>
				</div>
			</div>
		</div>


	</div>
@endsection