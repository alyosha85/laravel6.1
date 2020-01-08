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
				<form action="/communication" method="POST">
			  	@include('communication.form')
          {{-- buttons --}}
          <button type="submit" class="btn btn-primary float-right">
          <i class="far fa-save"></i> Speichern
					</button>
					<a href="{{url('/companies/'.$company_id.'?path=3')}}" class="btn btn-danger float-right mx-2">
						<i class="fas fa-ban"></i> Stornieren
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
</script>



@endsection


