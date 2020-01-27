
@csrf
<fieldset class="border rounded px-2 mb-2">
  <legend class="w-auto">Firma</legend>
  <input class="form-control lead pull-right" type="text" placeholder="Datum angelegt:  Heute von Erfurt" readonly>   

  <div class="form-row ">
    <div class="form-group col-md-6">
      <div class="form-group">
        <label for="name" >Name des Unternehmens <i class="fas fa-asterisk" style="color:#993955" title="Pflichtfelder"></i></label>
        <input type="text" name="name" class="form-control" value="{{ old('name') ?? $company->name }}" autocomplete="off" required>
      </div>
      <div>{{$errors->first('name')}}</div>
    </div>
    <div class="form-group col-md-3">
      <div class="form-group">
        <label for="title_id" >Namenszusatz <i class="fas fa-asterisk" style="color:#993955" title="Pflichtfelder"></i></label>
        <select name="title_id" class="form-control">
          <option  selected="true" disabled="disabled" value=''>Bitte wählen...</option>
          @foreach($titles as $title)
          <option value="{{ $title->id }}" {{ $title->id == $company->title_id ? 'selected' : '' }} >{{ $title->name }}</option>
          @endforeach
        </select>
      </div>
      <div>{{$errors->first('title_id')}}</div>
    </div>
    <div class="form-group col-md-3">
      <div class="form-group">
        <label for="status_id">Status <i class="fas fa-asterisk" style="color:#993955" title="Pflichtfelder"></i> &nbsp;<i class="fas fa-question-circle" style="color:#993955" id="myModal"></i></label>
        <select name="status_id" class="form-control">
          <option  selected="true" disabled="disabled" value=''>Bitte wählen...</option>
          @foreach($statuses as $status)
          <option value="{{ $status->id }}" {{$status->id == $company->status_id ? 'selected' : '' }}>{{ $status->name }}</option>
          @endforeach
        </select>
      </div>
      <div>{{$errors->first('status_id')}}</div>
    </div>
  </div>
{{-- line 2 --}}
<div class="form-row">
  <div class="form-group col-md-4">
    <div class="form-group">
      <label for="branch_id">Branche <i class="fas fa-asterisk" style="color:#993955" id="tooltip" title="Pflichtfelder"></i> &nbsp;<i class="fas fa-question-circle" style="color:#993955"></i></label>
      <select name="branch_id" class="form-control" id="branch_id" required>
        <option  selected="true" disabled="disabled" value=''>Bitte wählen...</option>
        @foreach($branches as $branch)
        <option value="{{ $branch->id }}" {{$branch->id == $company->branch_id ? 'selected' : '' }}>{{ $branch->name }}</option>
        @endforeach
      </select>
    </div>
    <div>{{$errors->first('branch_id')}}</div>
  </div>

  <div class="form-group col-md-4">
    <div class="form-group">
      <label for="section_id">Berufe <i class="fas fa-asterisk" style="color:#993955" title="Pflichtfelder"></i> &nbsp;<i class="fas fa-question-circle" style="color:#993955"></i></label>
        <select id="section_id" class="form-control selectpicker" multiple name="section_id[]" required>
        <option disabled="disabled" value=''>Bitte wählen...</option>
      </select>
    </div>
    <div>{{$errors->first('section_id')}}</div>
  </div>
  
  <div class="form-group col-md-4">
    <div class="form-group">
      <label for="profession_id">Tätigkeitsfeld <i class="fas fa-asterisk" style="color:#993955" title="Pflichtfelder"></i> &nbsp;<i class="fas fa-question-circle" style="color:#993955"></i></label>
        <select id="profession_id" class="selectpicker  form-control" data-live-search="true" multiple name="profession_id[]" required>
          @foreach($professions as $key => $value)
          <option @if(isset($company->id))    
          @foreach ($company->professions as $professionobject) 
           @if ($professionobject->id == $value->id) {{'selected'}}  @endif
          @endforeach
          @endif
          value='{{$value->id}}'>{{$value->name}}</option>
          @endforeach
      </select>
    </div>
    <div>{{$errors->first('profession_id')}}</div>
  </div>
</div>
</fieldset>

{{-- line 3 --}}
<fieldset class="border rounded px-2 mb-2">
<legend class="w-auto">Adresse</legend>
<div class="form-row">
  <div class="form-group col-md-6">
    <div class="form-group">
      <label for="state_id">Bundesland  <i class="fas fa-asterisk" style="color:#993955" title="Pflichtfelder"></i></label>
      <select name="state_id" class="form-control" id="state_id">
        <option  selected="true" disabled="disabled" value=''>Bitte wählen...</option>
        @foreach($states as $state)
        <option value="{{ $state->id }}" @if($state->id == $company->state_id ) {{'selected'}}
          @elseif ($state->id == @$stateid) {{'selected'}} @endif>{{ $state->name }}</option>
        @endforeach
      </select>
    </div>
    <div>{{$errors->first('state_id')}}</div>
  </div>

<div class="form-group col-md-6">
  <div class="form-group">
    <label for="city_id">Standort <i class="fas fa-asterisk" style="color:#993955" title="Pflichtfelder"></i></label>
    <select id="city_id" class="form-control selectpicker" multiple name="city_id[]" required>
      <option disabled="disabled" value=''>Wählen</option>
    </select>
  </div> 
</div>
<div>{{$errors->first('city_id')}}</div>
</div>
{{-- line 4 --}}
<div class="form-row">
  <div class="form-group col-md-4">
    <div class="form-group">
      <label for="address">Ort </label>
      <input type="text" name="address" class="form-control" value="{{ old('address') ?? $company->address }}" autocomplete="off">
    </div>
    <div>{{$errors->first('address')}}</div>
  </div>
  <div class="form-group col-md-4">
    <div class="form-group">
      <label for="address2">Straße </label>
      <input type="text" name="address2" class="form-control" value="{{ old('address2') ?? $company->address2  }}" autocomplete="off">
    </div>
    <div>{{$errors->first('address2')}}</div>
  </div>
  <div class="form-group col-md-4">
    <div class="form-group">
      <label for="zipcode">Postleitzahl</label>
      <input type="text" name="zipcode" class="form-control" value="{{ old('zipcode') ?? $company->zipcode }}" autocomplete="off">
    </div>
    <div>{{$errors->first('zipcode')}}</div>
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
    <div>{{$errors->first('phone')}}</div>
  </div>
  <div class="form-group col-md-6">
    <div class="form-group">
      <label for="fax">Fax</label>
      <input type="text" name="fax" class="form-control" value="{{ old('fax') ?? $company->fax }}" autocomplete="off">
    </div>
    <div>{{$errors->first('fax')}}</div>
  </div>
</div>
  {{-- line 6 --}}
<div class="form-row">
  <div class="form-group col-md-6">
    <div class="form-group">
      <label for="email">Email</label>
      <input type="text" name="email" class="form-control" value="{{ old('email') ?? $company->email }}" autocomplete="off">
    </div>
    <div>{{$errors->first('email')}}</div>
  </div>
  <div class="form-group col-md-6">
    <div class="form-group">
      <label for="website">Website</label>
      <input type="text" name="website" class="form-control" value="{{ old('website') ?? $company->website}}" autocomplete="off">
    </div>
    <div>{{$errors->first('website')}}</div>
  </div>
</div>
</fieldset>

<fieldset class="border rounded px-2 mb-2">
  <legend class="w-auto">Anmerkungen <i class="fas fa-question-circle" style="color:#993955"></i></legend>
  {{-- line 5 --}}
  <div class="form-row">
    <div class="form-group col-md-12">
      <div class="form-group">
        <textarea rows="4"  type="text" name="description" class="form-control" value="" autocomplete="off" 
        >{{ old('description') ?? $company->description }}</textarea> 
      </div>
      <div>{{$errors->first('description')}}</div>
    </div>
  </div>
</fieldset>


    

