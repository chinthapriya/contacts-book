@extends('master')
@section('content')

<div class="row">
	<div class="col-md-12">
		<br />
		<h3> Edit Record </h3>
		<br />
		@if(count($errors) > 0)
			<div class="alert alert-danger">
				<ul>
					@foreach($errors->all() as $error)
						<li>{{$error}}</li>
					@endforeach
				</ul>
			</div>
		@endif
		<form method="post" action="{{action('AdminController@update', $id)}}">
			{{csrf_field()}}
			<input type="hidden" name="method" value="PATCH" />
			<div class="form-group">
				<input type="text" name="name" class="form-control" value="{{$temp->name}}" placeholder="Enter Name" />
			</div>
			<div class="form-group">
				<input type="text" name="email" class="form-control" value="{{$temp->email}}" placeholder="Enter Email" />
			</div>
			<div class="form-group">
				<input type="text" name="contact" class="form-control" value="{{$temp->contact}}" placeholder="Enter Contact" />
			</div>
			<div class="form-group">
				<input type="text" name="address" class="form-control" value="{{$temp->address}}" placeholder="Enter Address" />
			</div>
			<div class="form-group">
				<input type="text" name="pincode" class="form-control" value="{{$temp->pincode}}" placeholder="Enter Pincode" />
			</div>
			<div class="form-group">
				<input type="text" name="user_email" class="form-control" value="{{$temp->user_email}}" placeholder="Enter User Email" />
			</div>
			<div class="form-group">
				<input type="submit" class="btn btn-primary" value="Edit" />
			</div>
		</form>
	</div>
	
</div>


@endsection