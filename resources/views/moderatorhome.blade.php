@extends('master')
@section('content')

<div class="row">
	<div class="col-md-12">
		<br />
		<h3 align="center"> All Contacts</h3>
		<br />
		@if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
		<table class="table table-bordered">
			<tr>
				<th> Name</th>
				<th> Email</th>
				<th> Contact</th>
				<th> Address</th>
				<th> Pincode</th>
				<th> Added By</th>
			</tr>
			@foreach($data as $row)
			<tr>
				<td>{{ $row->name }}</td>
				<td>{{ $row->email }}</td>
				<td>{{ $row->contact }}</td>
				<td>{{ $row->address }}</td>
				<td>{{ $row->pincode }}</td>
				<td>{{ $row->user_email }}</td>
			</tr>
			@endforeach
		</table>
        {!! $data->links() !!}
	</div>
</div>
@endsection