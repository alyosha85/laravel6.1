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

<div style="display:none" id="profession_all_text">
	<p class="MsoNormal" style="text-align: center;"><span style="font-weight: 600;">Der hier ausgewählte Tätigkeiten wird automatisch zur Tätigkeitsliste dieses Unternehmens hinzugefügt</span></p>
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

// new jBox('Modal', {
//   width: 300,
//   height: 160,
// 	attach: '#profession_all',
// 	animation: 'pulse',
// 	content:$('#profession_all_text') 
// });


$('#profession_all').jBox('Mouse', {
    theme: 'TooltipDark',
    content: $('#profession_all_text')
  });
  
new jBox('Tooltip', {
	attach: '.fa-asterisk',
	theme: 'TooltipDark'
});

</script>



@endsection


