@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in as user!
                </div>
                 <div class="panel-body">
                    <a href="{{ url('/import')}}">Import CSV</a>
                </div>
                <div class="panel-body">
                    <a href="{{ route('userhome') }}">View Your Contacts</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
