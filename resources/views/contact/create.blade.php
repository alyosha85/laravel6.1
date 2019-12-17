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
					<button type="submit" class="btn btn-primary float-right mx-2">Kontakt hinzufügen</button>
					<div class="btn-group float-right">
						<a href="/save/1" class="btn btn-primary float-right mx-2">
								<i class="glyphicon glyphicon-floppy-disk" aria-hidden="true"></i> Save
						</a>
						<a href="/cancel/1" class="btn btn-danger">Cancel</a>
				</div>
				</form>
			</div>
		</div>
	</div>
</div>

@endsection

