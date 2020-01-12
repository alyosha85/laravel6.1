@extends('layouts.app')

@section('title','Sprechpartner Anshauen')

@section('content')

<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
				@if(session()->has('message'))
		<div class="alert alert-success text-center " role="alert" >
			<strong>{{ session()->get('message')}}</strong>
		</div>
		@endif
		<fieldset class="border rounded px-2 mb-2">
			<legend class="w-auto">&nbsp;{{$contact->first_name ?? ''}}&nbsp;{{$contact->last_name ?? ''}}</legend>
				<div class="container-fluid">
					<div class="row col-md-12">
						<div class="col-md-11">
								<div class="form-group row">
									<input class="form-control lead float-right" type="text" placeholder="Datum angelegt:  Today von Matoyan" readonly> 
								</div>
						</div>
						<div class="col-md-1">
								<div class="form-group row">
									<a href="{{url('/companies/'.$contact->company_id.'?path=2')}}" class="form-control btn btn-primary float-right mx-2">
										<i class="fas fa-long-arrow-alt-left"></i> Zurück
									</a>
								</div>
						</div>
					</div>
				</div>
			<div class="container-fluid ">
					<div class="row col-md-12">
							<div class="col-md-6">
									<div class="form-group row">
										<label for="phone" class="col-sm-3 col-form-label font-weight-bold">Telefon:</label>
										<div class="col-sm-9">
											<input type="text" readonly class="form-control-plaintext" value="{{ $contact->phone ?? '' }}">
										</div>
									</div>
									<div class="form-group row">
										<label for="inputPassword" class="col-sm-3 col-form-label font-weight-bold">Email:</label>
										<div class="col-sm-9">
											<a class="form-control-plaintext" href="mailto:{{$contact->email}}">{{ $contact->email ?? '' }}</a>
										</div>
									</div>
							</div>
							<div class="col-md-5">
									<div class="form-group row">
										<label for="fax" class="col-sm-3 col-form-label font-weight-bold">Fax:</label>
										<div class="col-sm-9">
											<input type="text" readonly class="form-control-plaintext" value="{{ $contact->fax ?? '' }}">
										</div>
									</div>
									<div class="form-group row">
										<label for="inputPassword" class="col-sm-3 col-form-label font-weight-bold">Status:</label>
										<div class="col-sm-9">
											<span class="badge badge--{{$contact->contact_status['name']}}">{{$contact->contact_status['name']}}</span>
										</div>
									</div>
							</div>
							<div class="col-md-1">
								<div class="form-group row">
									<a href="/contact/{{ $contact->id }}/edit" class="form-control btn btn-primary float-right mx-2">
										<i class="fas fa-user-edit"></i> Bearbeiten
									</a>
								</div>
								<div class="form-group row">
								<a href="/communication/company/create/{{ $contact->company_id }}/contact/{{$contact->id}}" class="form-control btn btn-primary float-right mx-2">
										<i class="fas fa-tty"></i> Neue Kommunikation
									</a>
								</div>
						</div>
					</div>
					<div class="col-md-6">
					<div class="form-group row">
							<label for="note" class="col-sm-3 col-form-label font-weight-bold" style="color:lightcoral">Anmerkungen:</label>
							<div class="col-md-9">
								<textarea name="note" id="note" cols="30" rows="6" class="form-control" readonly>{{ $contact->note ?? '' }}</textarea>
							</div>
					</div>
				</div>
			</div>
		</fieldset>
		<fieldset class="border rounded px-2 mb-2">
			<legend class="w-auto">Kommunikationen</legend>
				<div class="container-fluid ">
					<div class="row">
						<div class="col-md-12">
							<div class="bs-example">
								<div id="accordion" role="tablist" aria-multiselectable="true" class="accordion">
								@foreach($communications as  $communication)
									<div class="card col-md-12">
										<h5 class="card-header" role="tab" id="#heading-{{ $communication->id }}">										
												<a data-toggle="collapse" data-parent="#accordion" href="#collapse-{{ $communication->id }}" aria-expanded="false" 								aria-controls="collapse-{{ $communication->id }}" class="d-block collapsed nounderline">
													<i class="fa fa-chevron-down float-right"></i>                             
														{{ \Carbon\Carbon::parse($communication->date)->format('d.m.y')}}
													</a>
										</h5>
										<div id="collapse-{{ $communication->id }}" class="collapsed collapse" role="tabpanel" aria-labelledby="heading-{{ $communication->id }}">
											<div class="card-body">
												<div class="row col-md-6">
													<div class="col-md-6">
														<div class="form-group row">
																<label for="participant" class="col-sm-6 col-form-label font-weight-bold">Teilnehmer:</label>
																<div class="col-sm-6">
																<input type="text" readonly class="form-control-plaintext" value="{{ $communication->participant ?? '' }}">
																</div>
														</div>
														<div class="form-group row">
																<label for="name" class="col-sm-6 col-form-label font-weight-bold">Branche:</label>
																<div class="col-sm-6">
																<input type="text" readonly class="form-control-plaintext" value="{{ $communication->name ?? '' }}">
																</div>
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group row">
																<label for="contact_reason" class="col-sm-6 col-form-label font-weight-bold">Kontaktgrund:</label>
																<div class="col-sm-6">
																<input type="text" readonly class="form-control-plaintext" value="{{$communication->contact_reason->name}}">
																</div>
														</div>
														<div class="form-group row">
															<label for="contact_type" class="col-sm-6 col-form-label font-weight-bold">Kontaktart:</label>
																<div class="col-sm-6">
																	<ul>
																		@foreach($communication->contact_types as $contact_type)
																		<li>
																		{{$contact_type->name}}
																		@endforeach
																	</li>
																</ul>
															</div>
														</div>
													</div>
												</div>
												<div class="col-md-6">
													<div class="col-md-12">
														<div style="width: 100%;">
															{{-- <textarea name="memo" id="memo" cols="30" rows="10" class="form-control" readonly >{{$communication->memo}}</textarea> --}}
															{!!$communication->memo!!}
															</div>
													</div>
												</div>	

											</div>
										</div>
									</div>
									<br>
									@endforeach
								</div>
							</div>
						</div>
					</div>
				</div>
			</fieldset>
			</div>
		</div>
	</div>




@endsection

@section('foot')
		
@endsection