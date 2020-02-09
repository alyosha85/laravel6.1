@extends('layouts.app')

@section('title','Edit' . $communication->date)

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
				<form action="/communication/{{ $communication->id }}" method="POST">
					@method('PATCH')
			  	@include('communication.form')
          {{-- buttons --}}
          <button type="submit" class="btn btn-primary float-right">
          <i class="far fa-save"></i> Änderungen speichern
					</button>
					<a href="{{url('/companies/'.$communication->company_id.'?path=3')}}" class="btn btn-danger float-right mx-2">
						<i class="fas fa-long-arrow-alt-left"></i> Zurück
					</a>
				</form>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection

@section('foot')
<script>

flatpickr.localize(flatpickr.l10ns.de);
flatpickr('#flatpickr');
 
 $('#flatpickr').on('focus', ({ currentTarget }) => $(currentTarget).blur());
 $("#flatpickr").prop('readonly', false);
		
	function goBack() {
		window.history.back();
	}

	$(document).ready(function() {
	$('#memo').summernote({
		height: 500,									//set editor height
		minHeight: null,             // set minimum height of editor
		maxHeight: null,             // set maximum height of editor    
		lang: 'de-DE'
	});

});
</script>
@endsection