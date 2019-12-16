@extends('layouts.app')

@section('content')

<div class="container">
	@if(session()->has('message'))
	<div class="alert alert-success text-center" role="alert">
			<strong>{{ session()->get('message')}}</strong>
	</div>
	@endif
	<div class="row">
		<div class="col-sm-12">
			<div class="panel panel-default">
				<div class="panel-body">
				<form action="{{ url('contact') }}" method="POST">
						@include('contact.form')
					<button type="submit" class="btn btn-primary float-right">Add Contact</button>
				</form>
			</div>
		</div>
	</div>
</div>

@endsection

