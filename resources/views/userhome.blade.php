@extends('master')
@section('content')

<div class="row">
	<div class="col-md-12">
		<br />
		<h3 align="center"> All Contacts</h3>
		<br />
		@if($message= Session::get('success'))
		<div class="alert alert-success">
		<p>{{$message}}</p>
		</div>
		@endif
		@if($message= Session::get('failure'))
		<div class="alert alert-success">
		<p>{{$message}}</p>
		</div>

		@endif
		<div align="right">
			<a href="{{route('usercreate')}}" class="btn btn-primary">Add</a>
		</div>

		<table class="table table-bordered">
			<tr>
				<th> Name</th>
				<th> Email</th>
				<th> Contact</th>
				<th> Address</th>
				<th> Pincode</th>
				<!-- <th> User Email</th> -->
				<th> Edit</th>
				<th> Delete</th>
			</tr>
			@foreach($data as $row)
			<tr>
				<td>{{ $row->name }}</td>
				<td>{{ $row->email }}</td>
				<td>{{ $row->contact }}</td>
				<td>{{ $row->address }}</td>
				<td>{{ $row->pincode }}</td>
				<!-- <td>{{ $row->user_email }}</td> -->
				<td>
					<a href="{{ action('UserController@edit', $row->id) }}" class="btn btn-warning">Edit</a>
				</td>
				<td>
					<form method="POST" class="delete_form" action="{{ action('UserController@destroy', $row->id) }}">
						{{csrf_field()}}
						<input type="hidden" name="method" value="DELETE" />
						<button type="submit" class="btn btn-danger">Delete</button>
					</form>
				</td>
			</tr>
			@endforeach
		</table>
	</div>
         {!! $data->links() !!}

</div>
<script>
	$(document).ready(function(){
		$('delete_form').on('submit', function(){
			if(confirm("Are you sure you want to delete this record?")){
				return true;
			}
			else{
				return false;
			}
		});
	});
</script>
@endsection