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
				<form action="{{url('company/'.$id)}}" method="POST">
					
					@csrf
					<fieldset class="border rounded px-2 mb-2">
						<legend class="w-auto">Firma</legend>
						<input class="form-control lead pull-right" type="text" placeholder="Datum angelegt:  Today von Matoyan" readonly>   

						<div class="form-row ">
							<div class="form-group col-md-6">
								<div class="form-group">
									<label for="name">Name <i class="fas fa-asterisk" style="color:#993955"></i></label>
									<input type="text" name="name" class="form-control" value="{{ old('name') ?? $company->name }}" autocomplete="off" required>
								</div>
							</div>
							<div class="form-group col-md-3">
								<div class="form-group">
									<label for="title_id">Namenszusatz <i class="fas fa-asterisk" style="color:#993955"></i></label>
									<select name="title_id" class="form-control">
										@foreach($titles as $title)
										<option value="{{ $title->id }}"{{ $title->id == $company->title_id ? 'selected' : '' }} >{{ $title->name }}</option>
										@endforeach
									</select>
								</div>
							</div>
							<div class="form-group col-md-3">
								<div class="form-group">
									<label for="status_id">Status <i class="fas fa-asterisk" style="color:#993955"></i></label>
									<select name="status_id" class="form-control">
										@foreach($statuses as $status)
										<option value="{{ $status->id }}" {{ $status->id == $company->status_id ? 'selected' : '' }}>{{ $status->name }}</option>
										@endforeach
									</select>
								</div>
							</div>
						</div>
					{{-- line 2 --}}
					<div class="form-row">
						<div class="form-group col-md-6">
							<div class="form-group">
								<label for="branch_id">Branche <i class="fas fa-asterisk" style="color:#993955"></i></label>
								<select name="branch_id" class="form-control">
									@foreach($branches as $branch)
									<option value="{{ $branch->id }}" {{ $branch->id == $company->branch_id ? 'selected' : '' }} >{{ $branch->name }}</option>
									@endforeach
								</select>
							</div>
						</div>
						<div class="form-group col-md-6">
							<div class="form-group">
								<label for="profession_id">Tätigkeitsfeld <i class="fas fa-asterisk" style="color:#993955"></i></label>
								<input type="text" class="form-control">
							</div>
						</div>
					</div>
				</fieldset>
				<fieldset class="border rounded px-2 mb-2">
					<legend class="w-auto">Adresse</legend>
					{{-- line 3 --}}
					<div class="form-row">
						<div class="form-group col-md-6">
							<div class="form-group">
								<label for="">City</label>
								<input type="text" class="form-control">
							</div>
						</div>
						<div class="form-group col-md-6">
							<div class="form-group">
								<label for="address">Straße </label>
								<input type="text" name="address" class="form-control" value="{{ old('address') ?? $company->address }}" autocomplete="off">
							</div>
						</div>
					</div>
					{{-- line 4 --}}
					<div class="form-row">
						<div class="form-group col-md-6">
							<div class="form-group">
								<label for="address2">Ort </label>
								<input type="text" name="address2" class="form-control" value="{{ old('address2') ?? $company->address2 }}" autocomplete="off">
							</div>
						</div>
						<div class="form-group col-md-6">
							<div class="form-group">
								<label for="zipcode">Postleitzahl</label>
								<input type="text" name="zipcode" class="form-control" value="{{ old('zipcode') ?? $company->zipcode }}" autocomplete="off">
							</div>
						</div>
					</div>
				</fieldset>
				<fieldset class="border rounded px-2 mb-2">
					<legend class="w-auto">Kontakt</legend>
					{{-- line 5 --}}
					<div class="form-row">
						<div class="form-group col-md-6">
							<div class="form-group">
								<label for="phone">Telefon</label>
								<input type="text" name="phone" class="form-control" value="{{ old('phone') ?? $company->phone }}" autocomplete="off">
							</div>
						</div>
						<div class="form-group col-md-6">
							<div class="form-group">
								<label for="fax">Fax</label>
								<input type="text" name="fax" class="form-control" value="{{ old('fax') ?? $company->fax }}" autocomplete="off">
							</div>
						</div>
					</div>
						{{-- line 6 --}}
					<div class="form-row">
						<div class="form-group col-md-6">
							<div class="form-group">
								<label for="email">Email</label>
								<input type="text" name="email" class="form-control" value="{{ old('fax') ?? $company->fax }}" autocomplete="off">
							</div>
						</div>
						<div class="form-group col-md-6">
							<div class="form-group">
								<label for="website">Website</label>
								<input type="text" class="form-control" value="{{ old('website') ?? $company->website }}" autocomplete="off">
							</div>
						</div>
					</div>
				</fieldset>
						{{-- buttons --}}
						<button type="submit" class="btn btn-primary float-right">
								<i class="far fa-save"></i> Speichern
						</button>


				</form>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection


