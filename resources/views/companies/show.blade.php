@extends('layouts.app')

@section('content')


<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
				@if(session()->has('message'))
		<div class="alert alert-success text-center " role="alert" >
			<strong>{{ session()->get('message')}}</strong>
		</div>
	@endif
				<nav>
					<div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
						<a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Firma</a>
						<a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Ansprechpartner liste</a>
						<a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Kommunikationsgeschichte</a>
					</div>
				</nav>
				<div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
					<div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
							<div class="container-fluid">
									<div class="row">
										<div class="col-xl-6">
											<div class="panel panel-default">
												<div class="panel-body">
													<h1 class="mb-0">{{$company->name}}<small><span class="badge pull-right">{{$company->title['name']}}</span></small></h1>
													<p class="text-muted">created on 12.12.2020 from Müller</p>
													<div id="accordion" role="tablist" aria-multiselectable="true">
															<div class="card">
																	<h5 class="card-header" role="tab" id="headingOne">
																			<a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne" class="d-block nounderline">
																				<i class="fa fa-chevron-down float-right"></i>Summary &nbsp;<i class="fas fa-building"></i> &nbsp;&nbsp;&nbsp;
																				<span class="badge badge--{{$company->status->name}}">{{$company->status->name}}</span>
																			</a>
																	</h5>
													
																	<div id="collapseOne" class="collapse show" role="tabpanel" aria-labelledby="headingOne">
																			<div class="card-body">
																					<form>
																							<div class="container-fluid ">
																									<div class="row">
																											<div class="col-md-6">
																													<div class="form-group row">
																															<label for="staticEmail" class="col-sm-4 col-form-label font-weight-bold">Branche:</label>
																															<div class="col-sm-8">
																																	<input type="text" readonly class="form-control-plaintext" id="staticEmail" value="{{$company->branch['name']}}">
																															</div>
																													</div>
																													<div class="form-group row">
																															<label for="inputPassword" class="col-sm-4 col-form-label font-weight-bold">Tätigkeitsfeld:</label>
																															<div class="col-sm-8">
																																	<ul>
																																			@foreach($company->professions as $profession)
																																			<li>
																																			{{$profession['name']}}
																																			@endforeach
																																		</li>
																																	</ul>
																															</div>
																													</div>
																											</div>
																											<div class="col-md-6">
																													<div class="form-group row">
																															<label for="inputPassword" class="col-sm-5 col-form-label font-weight-bold">Ansprechpartner:</label>
																															<div class="col-sm-7">
																																	<ul>
																																			@foreach($company->contacts as $contact)
																																			<li>
																																			<a href="#">{{$contact['last_name']}}</a>
																																			@endforeach
																																		</li>
																																	</ul>
																															</div>
																													</div>
																											</div>
																									</div>
																							</div>
																					</form>  
																			</div>
																	</div>
															</div>
															<div class="card">
																	<h5 class="card-header" role="tab" id="headingTwo">
																			<a class="collapsed d-block nounderline" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
																					<i class="fa fa-chevron-down float-right"></i> Adressen Details &nbsp;<i class="fas fa-map-marked-alt"></i>
																			</a>
																	</h5>
																	<div id="collapseTwo" class="collapse" role="tabpanel" aria-labelledby="headingTwo">
																			<div class="card-body">
																					<form>
																							<div class="container-fluid ">
																									<div class="row">
																											<div class="col-md-6">
																													<div class="form-group row">
																															<label for="staticEmail" class="col-sm-3 col-form-label font-weight-bold">Straße:</label>
																															<div class="col-sm-9">
																																	<input type="text" readonly class="form-control-plaintext" id="staticEmail" value="{{ $company->address ?? '' }}">
																															</div>
																													</div>
																													<div class="form-group row">
																															<label for="inputPassword" class="col-sm-3 col-form-label font-weight-bold">Ort:</label>
																															<div class="col-sm-9">
																																	<input type="text" readonly class="form-control-plaintext" id="staticEmail" value="{{ $company->address2 ?? '' }}">
																															</div>
																													</div>
																											</div>
																											<div class="col-md-6">
																													<div class="form-group row">
																															<label for="staticEmail" class="col-sm-4 col-form-label font-weight-bold">Postleitzahl:</label>
																															<div class="col-sm-8">
																																	<input type="text" readonly class="form-control-plaintext" id="staticEmail" value="{{ $company->zipcode ?? '' }}">
																															</div>
																													</div>
																													<div class="form-group row">
																															<label for="inputPassword" class="col-sm-3 col-form-label font-weight-bold">City:</label>
																															<div class="col-sm-9">
																																	<ul>
																																			@foreach($company->cities as $key => $item)
																																					<li> {{ $item->name }}</li>
																																			@endforeach
																															</ul>
																															</div>
																													</div>
																											</div>
																									</div>
																							</div>
																					</form>  
																			</div>
																	</div>
															</div>
															<div class="card">
																	<h5 class="card-header" role="tab" id="headingThree">
																			<a class="collapsed d-block nounderline" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
																					<i class="fa fa-chevron-down float-right"></i> Kommunikation &nbsp;<i class="fas fa-tty"></i>
																			</a>
																	</h5>
																	<div id="collapseThree" class="collapse" role="tabpanel" aria-labelledby="headingThree">
																			<div class="card-body">
																					<form>
																							<div class="container-fluid ">
																									<div class="row">
																											<div class="col-md-6">
																													<div class="form-group row">
																															<label for="staticEmail" class="col-sm-3 col-form-label font-weight-bold">Telefon:</label>
																															<div class="col-sm-9">
																																	<input type="text" readonly class="form-control-plaintext" id="staticEmail" value="{{ $company->phone ?? '' }}">
																															</div>
																													</div>
																													<div class="form-group row">
																															<label for="inputPassword" class="col-sm-3 col-form-label font-weight-bold">Fax:</label>
																															<div class="col-sm-9">
																																	<input type="text" readonly class="form-control-plaintext" id="staticEmail" value="{{ $company->fax ?? '' }}">
																															</div>
																													</div>
																											</div>
																											<div class="col-md-6">
																													<div class="form-group row">
																															<label for="staticEmail" class="col-sm-3 col-form-label font-weight-bold">Email:</label>
																															<div class="col-sm-9">
																																	<a class="form-control-plaintext" id="staticEmail" href="mailto:{{$company->email}}">{{ $company->email ?? '' }}</a>
																															</div>
																													</div>
																												 
																													<div class="form-group row">
																															<label for="staticEmail" class="col-sm-3 col-form-label font-weight-bold">Website:</label>
																															<div class="col-sm-9">
																																	<a target="_blank" class="form-control-plaintext" id="staticEmail" href="http://{{$company->website}}">{{ $company->website ?? '' }}</a>
																															</div>
																													</div>
																												 
																											</div>
																									</div>
																							</div>
																					</form>  
																			</div>
																	</div>
															</div>
															<div class="card">
																	<h5 class="card-header" role="tab" id="headingFour">
																			<a class="collapsed d-block nounderline" data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
																					<i class="fa fa-chevron-down float-right"></i> Anmerkungen &nbsp;<i class="fas fa-clipboard"></i>
																			</a>
																	</h5>
																	<div id="collapseFour" class="collapse" role="tabpanel" aria-labelledby="headingFour">
																			<div class="card-body">
																							{{-- {{ $company->description ?? '' }} --}}
																			</div>
																	</div>
															</div>
													</div>
												</div>
											</div>
										</div>
										<div class="col-xl-6" id="letter">
											<div class="panel panel-default">
												<div class="panel-body">
													<h1 class="mb-0">Letzter Eintrag<small>&nbsp;<i class="fas fa-file-signature"></i></small></h1>
													<p class="text-muted">created on 12.12.2020 from Müller</p>

													<div id="accordion" role="tablist" aria-multiselectable="true" class="col-sm-12">
															<div class="card">
																	<h5 class="card-header" role="tab" id="headingFive">
																			<a data-toggle="collapseFive" data-parent="#accordion"  aria-expanded="true" aria-controls="collapseFive" class="d-block nounderline">
																				</i> Teilnehmer &nbsp;<i class="fas fa-file-signature"></i>
																			</a>
																	</h5>
																	<div id="collapseFive" class="collapse show" role="tabpanel" aria-labelledby="headingFive">
																			<div class="card-body">
																					<form>
																							<div class="container-fluid ">
																									<div class="row">
																											<div class="col-md-6">
																													<div class="form-group row">
																															<label for="staticEmail" class="col-sm-6 col-form-label font-weight-bold">Datum:</label>
																															<div class="col-sm-6">
																																	<input type="text" readonly class="form-control-plaintext" id="staticEmail" value="hardCoded">
																															</div>
																													</div>
																													<div class="form-group row">
																															<label for="staticEmail" class="col-sm-6 col-form-label font-weight-bold">Ansprechpartner:</label>
																															<div class="col-sm-6">
																																	<input type="text" readonly class="form-control-plaintext" id="staticEmail" value="hardCoded">
																															</div>
																													</div>
																													<div class="form-group row">
																															<label for="staticEmail" class="col-sm-6 col-form-label font-weight-bold">Teilnehmer:</label>
																															<div class="col-sm-6">
																																	<input type="text" readonly class="form-control-plaintext" id="staticEmail" value="hardCoded">
																															</div>
																													</div>
																													<div class="form-group row">
																															<label for="staticEmail" class="col-sm-6 col-form-label font-weight-bold">Branche:</label>
																															<div class="col-sm-6">
																																	<input type="text" readonly class="form-control-plaintext" id="staticEmail" value="hardCoded">
																															</div>
																													</div>
																											</div>
																											<div class="col-md-6">
																												<div class="form-group row">
																													<label for="staticEmail" class="col-sm-4 col-form-label font-weight-bold">Gesprächnotiz:</label>
																													<textarea name="" id="" cols="30" rows="10" class="form-control" readonly>Lorem ipsum dolor sit amet consectetur adipisicing elit. Provident obcaecati nobis neque deserunt pariatur dicta, corporis cupiditate. Rem corrupti magnam officia id perspiciatis a praesentium eligendi mollitia beatae. Laboriosam voluptatum impedit alias mollitia consectetur voluptatibus magni dolorum. Vel, aliquam velit.</textarea>
																												</div>
																											</div>
																									</div>
																							</div>
																					</form>  
																			</div>
																	</div>
															</div>
													</div>
												</div>
											</div>
										</div>
									</div>
							</div>
						</div>
						{{-- Ansprechpartner page 2 --}}
						<div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
							<div class="container-fluid">
								<div class="row">
									<div class="col-xl-12">
										<div class="panel panel-default">
											<div class="panel-body">
											<h1 class="mb-0">{{$company->name}}<small><span class="badge pull-right">{{$company->title['name']}}</span></small></h1>
											<a href="/contact/create" class="btn btn-primary mb-3">Add Contact</a>
											<div class="col-md-6">
												<div class="table-responsive-xl">
													@if(count($company->contacts) < 1)
														<div class="alert alert-primary text-center">
																<strong>Es sind noch keine Kontakte vorhanden!</strong> 
														</div>                                      
													@else
													<table class="table" id="company_table">
														<thead>
															<tr>
																<th>Anrede</th>
																<th>Vorname</th>
																<th>Nachname</th>
																<th>E-mail</th>
																<th>Telefon</th>
																<th>Fax</th>
																<th>Status</th>
																<th></th>
															</tr>
															<tr>
																<th></th>
																<th></th>
																<th></th>
																<th></th>
																<th></th>
																<th></th>
																<th></th>
																<th></th>																
															</tr>
														</thead>
														<tbody>
															@foreach($company->contacts as $contact)
															<tr>
																<td>{{$contact->contact_title}}</td>
																<td>{{$contact->first_name}}</td>
																<td>{{$contact->last_name}}</td>
																<td><a href="mailto:{{$contact->email}}">{{$contact->email}}</a></td>
																<td>{{$contact->phone}}</td>
																<td>{{$contact->fax}}</td>
																<td>{{$contact->active}}</td>
																<td>
																	<a href="#" class="btn btn-outline-primary btn-sm border-0"><i class="fas fa-eye"></i></a>

																		</form>
																</td>
															</tr>
															@endforeach
														</tbody>
													</table>
														@endif
												</div>										
											</div>
   

											</div>
										</div>
									</div>	
								</div>
						</div>
				</div>
				<div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
				</div>
			</div>
		</div>
	</div>
</div>




	

	




@endsection
