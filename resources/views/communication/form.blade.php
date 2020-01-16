  @csrf
  <fieldset class="border rounded px-2 mb-2">
    <legend class="w-auto">Communication</legend>
    <input class="form-control lead pull-right" type="text" placeholder="Datum angelegt:  Today von Matoyan" readonly>  
    <input type="hidden" name="company_id" value="{{ $company_id ?? '' }} ">
  
    <div class="form-row ">
      <div class="form-group col-md-6">
        <div class="form-group">
          <label for="date">Datum <i class="fas fa-asterisk" style="color:#993955" title="Pflichtfelder"></i></label>
          <input name="date" class="form-control {{ $errors->has('date') ? ' has-error' : '' }}" type="text" placeholder="Wählen Sie ein Datum" id="flatpickr"  required='required' value="{{ old('date') ?? $communication->date }}">
        </div>
        <div>{{$errors->first('date')}}</div>
      </div>
      <div class="form-group col-md-3">
        <div class="form-group">
          <label for="contact_type_id">Kontaktart <i class="fas fa-asterisk" style="color:#993955" title="Pflichtfelder"></i></label>
          <select id="contact_type_id" class="form-control selectpicker" multiple name="contact_type_id[]" required>
            @foreach($contact_types as $key => $value)
            <option @if(isset($communication->id))    
            @foreach ($communication->contact_types as $contactobject) 
             @if ($contactobject->id == $value->id) {{'selected'}}  @endif
            @endforeach
            @endif
            value="{{$value->id}}">{{$value->name}}</option>
            @endforeach
          </select>
        </div>
        <div>{{$errors->first('contact_type_id')}}</div>
      </div>
      <div class="form-group col-md-3">
        <div class="form-group">
          <label for="contact_reason_id">Kontakgrund <i class="fas fa-asterisk" style="color:#993955" title="Pflichtfelder"></i></label>
          <select name="contact_reason_id" class="form-control" required>
            <option  selected="true" disabled="disabled" value=''>Bitte wählen...</option>
            @foreach($contact_reasons as $reason)
            <option value="{{ $reason->id }}" {{$reason->id == $communication->contact_reason_id ? 'selected' : '' }}>{{ $reason->name }}</option>
            @endforeach
          </select>
        </div>
        <div>{{$errors->first('contact_reason_id')}}</div>
      </div>
    </div>
  {{-- line 2 --}}
    <div class="form-row ">
      <div class="form-group col-md-6">
        <div class="form-group">
          <label for="contact_id">Ansprechpartner <i class="fas fa-asterisk" style="color:#993955" title="Pflichtfelder"></i></label>
          <select name="contact_id" class="form-control" required>
            <option  selected="true" disabled="disabled" value=''>Bitte wählen...</option>
            @foreach($contacts as $contact)
            <option value="{{ $contact->id }}" @if($contact->id == $communication->contact_id) {{'selected'}} 
              @elseif ($contact->id == @$contact_id) {{'selected'}} @endif>{{ $contact->last_name }}</option>
            @endforeach
          </select>
        </div>
        <div>{{$errors->first('contact_id')}}</div>
      </div>
      <div class="form-group col-md-6">
        <div class="form-group">
          <label for="participant">Teilnehmer</label>
          <input type="text" name="participant" class="form-control" value="{{ old('participant') ?? $communication->participant }}" autocomplete="off">
        </div>
        <div>{{$errors->first('participant')}}</div>
      </div>
    </div>
    {{-- line 3 --}}
    <div class="form-row ">
      <div class="form-group col-md-6">
        <div class="form-group">
          <label for="profession_id">Tätigkeitsfeld (Gehört der Firma)</label>
          <select id="profession_id" class="selectpicker  form-control" data-live-search="true" multiple name="profession_id[]">
            <option disabled="disabled" value=''>Bitte wählen...</option>
              @foreach($professions as $key => $value)
              <option @if(isset($communication->company_id))    
              @foreach ($profession as $professionobject) 
               @if ($professionobject->id == $value->id) {{'selected'}}  @endif
              @endforeach
              @endif
              value='{{$value->id}}'>{{$value->name}}</option>
              @endforeach
              <button value="-1">Show All</button>
          </select>
        </div>
        <div>{{$errors->first('profession_id')}}</div>
      </div>
      <div class="form-group col-md-6" style="" id="profession_id_all">
        <div class="form-group">
        <label for="profession_id_all">Tätigkeitsfeld (Alle)</label>
          <select class="selectpicker  form-control" data-live-search="true" multiple name="profession_all_id[]">
            @foreach($profession_all as $key => $value)
            <option 
            value='{{$value->id}}'>{{$value->name}}</option>
            @endforeach
          </select>
        </div>
      </div>
    </div>
    <div>{{$errors->first('profession_id_all')}}</div>
  </div>
</div>
     {{-- line 4 --}}
     <div class="form-row ">
      <div class="form-group col-md-12">
        <div class="form-group">
          <label for="memo">Gesprächsnotiz <i class="fas fa-asterisk" style="color:#993955"></i></label>
          <textarea type="text" cols="120" rows="30" name="memo" class="form-control" value="" id="memo" autocomplete="nope" required>{{ old('memo') ?? $communication->memo }}
          </textarea>
        </div>
        <div>{{$errors->first('memo')}}</div>
      </div>
    </div>
  
  
</fieldset>

