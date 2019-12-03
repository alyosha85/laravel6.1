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
					@csrf
					<fieldset class="border rounded px-2 mb-2">
						<legend class="w-auto">Ansprechpartner</legend>
						{{-- <input class="form-control lead pull-right" type="text" placeholder="Datum angelegt:  Today von Matoyan" readonly>    --}}

						<div class="form-row ">
							 <div class="form-group col-md-2">
								<div class="form-group">
									<label for="contact_title">Anrede<i class="fas fa-asterisk" style="color:#993955"></i></label>									
									<select name="contact_title" id="contact_title" class="form-control">
										<option value="" disabled>Anrede wählen</option>
										<option value="1">Herr</option>
										<option value="0">Frau</option>
									</select>
								</div>
							</div> 
							<div class="form-group col-md-5">
								<div class="form-group">
									<label for="first_name">Vorname <i class="fas fa-asterisk" style="color:#993955"></i></label>
                  <input type="text" name="first_name" class="form-control" value="{{ old('first_name') ?? $contact->first_name }}" autocomplete="off" required>
								</div>
								<div>{{$errors->first('first_name')}}</div>
              </div>
							<div class="form-group col-md-5">
								<div class="form-group">
									<label for="last_name">Nachname <i class="fas fa-asterisk" style="color:#993955"></i></label>
									<input type="text" name="last_name" class="form-control" value="{{ old('last_name') ?? $contact->last_name }}" autocomplete="off" required>
								</div>
							</div>
						</div>
						<div class="form-row ">
								<div class="form-group col-md-2">
								 <div class="form-group">
									 <label for="active">Status <i class="fas fa-asterisk" style="color:#993955"></i></label>									
									 <select name="active" id="active" class="form-control" required>
										 <option value="" disabled>wählen</option>
										 <option value="1">Aktiv</option>
										 <option value="0">Inaktiv</option>
									 </select>
								 </div>
							 </div> 
							 <div class="form-group col-md-5">
								 <div class="form-group">
									 <label for="email">E-mail</label>
									 <input type="text" name="email" class="form-control" value="{{ old('email') ?? $contact->email }}" autocomplete="nope">
								 </div>
							 </div>
							 <div class="form-group col-md-5">
								 <div class="form-group">
									 <label for="phone">Telefon</label>
									 <input type="text" name="phone" class="form-control" value="{{ old('phone') ?? $contact->phone }}" autocomplete="nope">
								 </div>
							 </div>
						 </div>
						 <div class="form-row ">
							 <div class="form-group col-md-2">
								 <div class="form-group">
									 <label for="Fax">Fax</label>
									 <input type="text" name="fax" class="form-control" value="{{ old('fax') ?? $contact->fax }}" autocomplete="nope">
								 </div>
							 </div>
							 <div class="form-group col-md-10">
								 <div class="form-group">
									 <label for="note">Anmerkungen</label>
									 <textarea type="text" cols="60" rows="10" name="note" class="form-control" value="" autocomplete="nope">{{ old('note') ?? $contact->note }}</textarea>
								 </div>
							 </div>
						 </div>
					</fieldset>
					<button type="submit" class="btn btn-primary float-right">Add Contact</button>
				</form>
			</div>
		</div>
	</div>
</div>

@endsection

