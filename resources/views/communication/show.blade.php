@extends('layouts.app')


@section('content')


<div id="accordion" role="tablist" aria-multiselectable="true" class="accordion">
  <div class="card">
    <h5 class="card-header" role="tab" id="#heading-{{ $communication->id }}">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapse-{{ $communication->id }}" aria-expanded="true" aria-controls="collapse-{{ $communication->id }}" class="d-block">
            <i class="fa fa-chevron-down float-right"></i>                             
              {{ \Carbon\Carbon::parse($communication->date)->format('d.m.Y')}}
        </a>
    </h5>
    <div id="collapse-{{ $communication->id }}" class="collapse show" role="tabpanel" aria-labelledby="heading-{{ $communication->id }}">
        <div class="card-body">

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
                      <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="{{$communication->contact_reason->name}}">
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
      </div>
    </div>
  </div>
</div>




@endsection

@section('foot')
    
@endsection


