@extends('layouts.app')

@section('title','Add New company')

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
				<form action="/companies" method="POST">
			  	@include('companies.form')
          {{-- buttons --}}
          <button type="submit" class="btn btn-success float-right">
						<i class="far fa-save"></i> Speichern
						</button>
						<button onclick="goBack()" class="btn btn-danger float-right mx-2">
							<i class="fas fa-ban"></i> Stornieren
						</button>

					</div>
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


