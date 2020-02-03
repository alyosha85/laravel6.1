@extends('layouts.app')

@section('title','Kommunication')

@section('content')


<div class="container-fluid">
  <div class="row">
    <div class="col-md-12">
      <fieldset class="border rounded px-2 mb-2">
        <legend class="w-auto">&nbsp;{{ \Carbon\Carbon::parse($communication->date)->format('d.m.Y')}}</legend>
        <div class="container-fluid">
          <div class="row col-md-12">
            <div class="col-md-11">
              <div class="form-group row">
                <input class="form-control lead float-right" type="text" placeholder="Datum angelegt:  Today von Matoyan" readonly> 
              </div>
            </div>
            <div class="col-md-1">
              <div class="form-group row">
                <a href="{{url('/companies/'.$communication->company_id.'?path=3')}}" class="form-control btn btn-primary float-right mx-2">
                  <i class="fas fa-long-arrow-alt-left"></i> Zurück
                </a>
              </div>
            </div>
          </div>
        </div>
        <div class="container-fluid">
          <div class="row col-md-12">
            <div class="col-md-6">
              <div class="form-group row">
                <label for="participant" class="col-sm-3 col-form-label font-weight-bold">Teilnehmer:</label>
                <div class="col-sm-9">
                  <input type="text" readonly class="form-control-plaintext" value="{{ $communication->participant ?? 'Keine' }}">
                </div>
              </div>
              <div class="form-group row">
                <label for="inputPassword" class="col-sm-3 col-form-label font-weight-bold">Tätigkeitsfeld:</label>
                <div class="col-sm-9">

                  <div class="col-sm-8">
                    <ul>
                        @foreach($communication->professions as $profession)
                        <li>
                        {{$profession->name}}
                        @endforeach
                      </li>
                    </ul>
                </div>

                </div>
              </div>
            </div>
            <div class="col-md-5">
              <div class="form-group row">
                <label for="contact_type" class="col-sm-3 col-form-label font-weight-bold">Kontaktart:</label>
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
              <div class="form-group row">
                <label for="contact_reason" class="col-sm-3 col-form-label font-weight-bold">Kontaktgrund:</label>
                <div class="col-sm-9">
                  <input type="text" readonly class="form-control-plaintext" value="{{$communication->contact_reason->name}}">
                </div>
              </div>
            </div>
            <div class="col-md-1">
              <div class="form-group row">
                <a href="/communication/{{ $communication->id }}/edit" class="form-control btn btn-primary float-right mx-2">
                  <i class="fas fa-user-edit"></i> Bearbeiten
                </a>
              </div>
              <div class="form-group row">
              {{-- <a href="/communication/company/create/{{ $communication->company_id }}/contact/{{$contact->id}}" class="form-control btn btn-primary float-right mx-2">
                  <i class="fas fa-tty"></i> Neue Kommunikation
                </a> --}}
              </div>
            </div>

            <div class="row col-md-12">
              <div class="form-group row">
                <label for="participant" class="col-sm-3 col-form-label font-weight-bold">Gesprächsnotiz:</label>
                <div class="col-sm-9">
                  <textarea name="memo" id="memo_info" cols="100" rows="10" class="form-control-plaintext" readonly >{!!$communication->memo!!}
                  </textarea> 
                </div>
              </div>
            </div>

          </div>
        </div>
      </fieldset>
    </div>
  </div>
</div>






















{{-- 






<div id="accordion" role="tablist" aria-multiselectable="true" class="accordion">
  <div class="card">
    <h5 class="card-header" role="tab" id="#heading-{{ $communication->id }}">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapse-{{ $communication->id }}" aria-expanded="true" aria-controls="collapse-{{ $communication->id }}" class="d-block">
            <i class="fa fa-chevron-down float-right"></i>                             
        </a>
    </h5>
    <div id="collapse-{{ $communication->id }}" class="collapse show" role="tabpanel" aria-labelledby="heading-{{ $communication->id }}">
        <div class="card-body">

          <div class="row col-md-6">
            <div class="col-md-6">
                <div class="form-group row">
                    <label for="participant" class="col-sm-6 col-form-label font-weight-bold">Teilnehmer :</label>
                    <div class="col-sm-6">
                    <input type="text" readonly class="form-control-plaintext" value="{{ $communication->participant ?? 'Keine' }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="name" class="col-sm-6 col-form-label font-weight-bold">Tätigkeitsfeld:</label>
                    <div class="col-sm-6">
                      <input type="text" readonly class="form-control-plaintext" value="{{ $communication->name ?? '' }}">
                    </div>
                </div>
            </div>
            <div class="col-md-6">
              <div class="form-group row">
                  <label for="contact_reason" class="col-sm-6 col-form-label font-weight-bold">Kontaktgrund :</label>
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
            <div class="col-md-6">
              <div class="form-group row">
                <label for="memo" class="col-sm-6 col-form-label font-weight-bold">Gesprächnotiz</label>
                <div class="col-sm-6">
                  {!!$communication->memo!!}
                </div>
              </div>
            </div>
        </div>
      </div>
    </div>
  </div>
</div> --}}




@endsection

@section('foot')
    
@endsection


