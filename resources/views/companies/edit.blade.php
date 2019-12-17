@extends('layouts.app')

@section('title','Edit' . $company->name)

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
				<form action="/companies/{{ $company->id }}" method="POST">
					@method('PATCH')
			  	@include('companies.form')
          {{-- buttons --}}
          <button type="submit" class="btn btn-primary float-right">
          <i class="far fa-save"></i> Änderungen speichern
					</button>
					<button onclick="goBack()" class="btn btn-danger float-right mx-2">
						<i class="fas fa-ban"></i> Stornieren
					</button>
				</form>
				</div>
			</div>
		</div>
	</div>
</div>


<script>
	function goBack() {
		window.history.back();
	}
</script>

@endsection