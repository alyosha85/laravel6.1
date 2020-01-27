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





@endsection


@section('foot')
		


<script>

	function goBack() {
		window.history.back();
	}

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
		var selected_section = <?php echo json_encode($selected_section); ?>;
		jQuery.ajax({url: "/branches/"+ {{ $company->branch_id }}, success: function(child){
				jQuery('#section_id').children().remove();
				jQuery('#section_id').append('<option disabled="disabled" value="">Bitte wählen...</option>');
				child.forEach(function(item){
					var position = selected_section.indexOf(item.id);
					if (position >= 0) {
						var classes = "selected";
					}
					else var classes = "";
					jQuery('#section_id').append('<option '+classes+' value="'+item.id+'">'+item.name+'</option>');
				});
				jQuery('#section_id').selectpicker('refresh');
			}});

	});






</script>


@endsection
