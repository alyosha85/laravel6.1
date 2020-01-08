@extends('layouts.app')

@section('title','Edit' . $contact->last_name)

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
				<form action="/contact/{{ $contact->id }}" method="POST">
					@method('PATCH')
			  	@include('contact.form')
          {{-- buttons --}}
          <button type="submit" class="btn btn-primary float-right">
          <i class="far fa-save"></i> Änderungen speichern
					</button>
					<a href="{{url('/companies/'.$contact->company_id.'?path=2')}}" class="btn btn-danger float-right mx-2">
						<i class="fas fa-long-arrow-alt-left"></i> Zurück
					</a>
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