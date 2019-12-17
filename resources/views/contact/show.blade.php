{{-- @extends('layouts.app')

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
         <input class="form-control lead float-right" type="text" placeholder="Datum angelegt:  Today von Matoyan" readonly> 
         <div class="container-fluid ">
             <div class="row col-md-12">
                 <div class="col-md-6">
                     <div class="form-group row">
												<label for="staticEmail" class="col-sm-3 col-form-label font-weight-bold">Telefon:</label>
												<div class="col-sm-9">
													<input type="text" readonly class="form-control-plaintext" id="staticEmail" value="{{ $contact->phone ?? '' }}">
												</div>
                     </div>
                     <div class="form-group row">
												<label for="inputPassword" class="col-sm-3 col-form-label font-weight-bold">Email:</label>
												<div class="col-sm-9">
													<a class="form-control-plaintext" id="staticEmail" href="mailto:{{$contact->email}}">{{ $contact->email ?? '' }}</a>
												</div>
                     </div>
                 </div>
                 <div class="col-md-6">
                     <div class="form-group row">
												<label for="staticEmail" class="col-sm-3 col-form-label font-weight-bold">Fax:</label>
												<div class="col-sm-9">
													<input type="text" readonly class="form-control-plaintext" id="staticEmail" value="{{ $contact->fax ?? '' }}">
												</div>
                     </div>
                     <div class="form-group row">
												<label for="inputPassword" class="col-sm-3 col-form-label font-weight-bold">Status:</label>
												<div class="col-sm-9">
													<input type="text" readonly class="form-control-plaintext" id="staticEmail" value="{{$contact->contact_status['name']}}">
												</div>
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
										<div class="panel-group" id="accordion">
										@foreach($contact->communications as  $communication)
												<div class="panel panel-default">
														<div class="panel-heading">
																<h4 class="panel-title">
																		<a data-toggle="collapse" data-parent="#accordion" href="#collapse-{{ $communication->id }}">{{ $communication->date }}</a>
																</h4>
														</div>
														<div id="collapse-{{ $communication->id }}" class="panel-collapse collapse in">
																<div class="panel-body">
																	<div class="row col-md-6">
																		<div class="col-md-6">
																				<div class="form-group row">
																						<label for="staticEmail" class="col-sm-6 col-form-label font-weight-bold">Teilnehmer :</label>
																						<div class="col-sm-6">
																						<input type="text" readonly class="form-control-plaintext" id="staticEmail" value="{{ $communication->participant ?? '' }}">
																						</div>
																				</div>
																				<div class="form-group row">
																						<label for="inputPassword" class="col-sm-6 col-form-label font-weight-bold">Branche:</label>
																						<div class="col-sm-6">
																							<input type="text" readonly class="form-control-plaintext" id="staticEmail" value="{{ $communication->name ?? '' }}">
																						</div>
																				</div>
																		</div>
																		<div class="col-md-6">
																			<div class="form-group row">
																					<label for="staticEmail" class="col-sm-6 col-form-label font-weight-bold">Kontaktgrund :</label>
																					<div class="col-sm-6">
																							<input type="text" readonly class="form-control-plaintext" id="staticEmail" value="{{$communication->contact_reasons['name']}}">
																					</div>
																			</div>
																			<div class="form-group row">
																				<label for="inputPassword" class="col-sm-6 col-form-label font-weight-bold">Kontaktart:</label>
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
																<div class="row col-md-12">
																	<div class="col-md-12">
																			<div class="form-group">
																					<label for="staticEmail" class="col-sm-4 col-form-label font-weight-bold">Gesprächsnotiz  :</label>
																					<div class="col-sm-">
																						<textarea name="memo" id="memo" cols="30" rows="5" class="form-control border border-primary" readonly>{{$communication->memo}}</textarea>
																					</div>
																			</div>
																	</div>
																</div>
														</div>
												</div>
												@endforeach
										</div>
									</div>
								</div>
							</div>
						</div>
         </div>
				</fieldset>
      </div>
		</div>
</div>

@endsection --}}