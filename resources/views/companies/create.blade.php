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

<div style="display:none" id="status_note_text">
<h3 style="color:darkolivegreen;">Aktiv</h3>
</div>

<div style="display:none" id="branche_note_text">
	<p class="MsoNormal" style="text-align: center;"><span style="font-style: italic; font-weight: 700; text-decoration-line: underline;">Beschreibt das Fachgebiet des Unternehmens</span></p><p class="MsoNormal" style="text-align: center;">Der name des Unternehmens sollte daher zur Branche passen</p><p class="MsoNormal" style="text-align: center; font-size: 14.4px;"><br></p><p style="line-height: 1;"><br></p><p class="MsoNormal"></p>
</div>  

<div style="display:none" id="section_note_text">
	<p class="MsoNormal" style="text-align: center;"><span style="font-style: italic; font-weight: 700; text-decoration-line: underline;">Die Beschreibt aus welchen Berufen das Unternehmen besteht</span></p><p class="MsoNormal" style="text-align: center; font-size: 14.4px;"><span style="font-size: 14.4px; background-color: rgb(255, 255, 0); font-weight: bold;">Hinweis</span><span style="font-size: 14.4px;">: Es können mehrere Tätigkeiten ausgewält werden</span><br></p><p class="MsoNormal" style="text-align: center; font-size: 14.4px;"><br></p><p style="line-height: 1;"><br></p><p class="MsoNormal"></p>
</div>  

<div style="display:none" id="profession_note_text">
	<p class="MsoNormal" style="text-align: center;"><span style="font-style: italic; font-weight: 700; text-decoration-line: underline;">Die Tätigkeit basiert auf den Praktikumsangeboten des Unternehmens</span></p><p class="MsoNormal" style="text-align: center; font-size: 14.4px;"><span style="font-size: 14.4px; background-color: rgb(255, 255, 0); font-weight: bold;">Hinweis</span><span style="font-size: 14.4px;">: Es können mehrere Tätigkeiten ausgewält werden</span><br></p><p class="MsoNormal" style="text-align: center; font-size: 14.4px;"><span style="font-size: 18px; font-weight: bold;"><span style="background-color: rgb(255, 255, 0);">Tätigkeit:</span>&nbsp;beschreibt<span style="color: rgb(255, 0, 0);">&nbsp;</span><span style="background-color: rgb(255, 255, 0);">nicht das Unternehmen</span>!!!</span></p><p class="MsoNormal" style="text-align: center; line-height: 1;"><span style="font-style: italic;">Bsp: In einem Krankenhaus wird ein koch oder / und Putzkraft angeboten !</span></p><p style="line-height: 1;"><br></p><p class="MsoNormal"><br></p>
</div>




@endsection

@section('foot')
		


<script>

	function goBack() {
		window.history.back();
	}

	jQuery( document ).ready(function() {
		jQuery("#branch_id").change(function(){
			var parent = jQuery(this).val();
			jQuery.ajax({url: "/branches/"+parent, success: function(child){
				jQuery('#section_id').children().remove();
				jQuery('#section_id').append('<option disabled="disabled" value="">Bitte wählen...</option>');
				child.forEach(function(item){
					jQuery('#section_id').append('<option value="'+item.id+'">'+item.name+'</option>');
				});
				jQuery('#section_id').selectpicker('refresh');
			}});
		});
	});

	// jQuery( document ).ready(function() {
	// 	jQuery("#section_id").change(function(){
	// 		var parent = jQuery(this).val();
	// 		jQuery.ajax({url: "/sections/"+parent, success: function(child){
	// 			jQuery('#profession_id').children().remove();
	// 			jQuery('#profession_id').append('<option  disabled="disabled" value="">Berufe...</option>');

	// 			child.forEach(function(item){
	// 				jQuery('#profession_id').append('<option value="'+item.id+'">'+item.name+'</option>');
	// 			});
	// 			jQuery('#profession_id').selectpicker('refresh');
	// 		}});
	// 	});
	// });


	jQuery( document ).ready(function() {
		var stateid = {{$stateid}};
		jQuery.ajax({url: "/state/"+stateid, success: function(child){
				child.forEach(function(item){
					jQuery('#city_id').append('<option value="'+item.id+'">'+item.name+'</option>');
				});
				jQuery('#city_id').val({{$cityid}});
				jQuery('#city_id').selectpicker('refresh');
			}});
		jQuery("#state_id").change(function(){
			var parent = jQuery(this).val();
			jQuery.ajax({url: "/state/"+parent, success: function(child){
				jQuery('#city_id').children().remove();
				jQuery('#city_id').append('<option disabled="disabled" value="">Bitte wählen...</option>');
				child.forEach(function(item){
					jQuery('#city_id').append('<option value="'+item.id+'">'+item.name+'</option>');
				});
				jQuery('#city_id').selectpicker('refresh');
			}});
		});
	});

</script>

<script>
	new jBox('Tooltip', {
	attach: '.fa-asterisk',
	theme: 'TooltipDark'
});



new jBox('Modal', {
  width: 300,
  height: 300,
	attach: '#status_note',
	animation: 'pulse',
	content:$('#status_note_text') 
});

new jBox('Modal', {
  width: 400,
  height: 250,
	attach: '#branche_note',
	animation: 'pulse',
	content:$('#branche_note_text') 
});

new jBox('Modal', {
  width: 400,
  height: 250,
	attach: '#section_note',
	animation: 'pulse',
	content:$('#section_note_text') 
});

new jBox('Modal', {
  width: 600,
  height: 320,
	attach: '#profession_note',
	animation: 'pulse',
	content:$('#profession_note_text') 
});

</script>


@endsection


