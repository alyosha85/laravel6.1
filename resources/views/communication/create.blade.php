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


	$(document).ready(function() {
	$('#memo').summernote({
		height: 500,									//set editor height
		minHeight: null,             // set minimum height of editor
		maxHeight: null,             // set maximum height of editor    
		lang: 'de-DE',
		toolbar: [
            [ 'style', [ 'style' ] ],
            [ 'font', [ 'bold', 'italic', 'underline', 'strikethrough', 'superscript', 'subscript', 'clear'] ],
            [ 'fontname', [ 'fontname' ] ],
            [ 'fontsize', [ 'fontsize' ] ],
            [ 'color', [ 'color' ] ],
            [ 'para', [ 'ol', 'ul', 'paragraph', 'height' ] ],
            [ 'table', [ 'table' ] ],
            [ 'insert', [ 'link'] ],
            [ 'view', [ 'undo', 'redo', 'fullscreen', 'codeview'] ]
        ]
	});

});

	new jBox('Tooltip', {
	attach: '.fa-asterisk',
	theme: 'TooltipDark'
});


</script>



@endsection


