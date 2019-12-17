
  @csrf
  <fieldset class="border rounded px-2 mb-2">
    <legend class="w-auto">Communication</legend>
    <input class="form-control lead pull-right" type="text" placeholder="Datum angelegt:  Today von Matoyan" readonly>   
  
    <div class="form-row ">
      <div class="form-group col-md-6">
        <div class="form-group">
          <label for="date">Datum <i class="fas fa-asterisk" style="color:#993955"></i></label>
          <input name="date" class="form-control {{ $errors->has('date') ? ' has-error' : '' }}" type="text" placeholder="Wählen Sie ein Datum" id="flatpickr" required='required' value="">
        </div>
        <div>{{$errors->first('date')}}</div>
      </div>
      <div class="form-group col-md-3">
        <div class="form-group">
          <label for="contact_type_id">Kontaktart <i class="fas fa-asterisk" style="color:#993955"></i></label>
          <select id="contact_type_id" class="form-control selectpicker" multiple name="contact_type_id[]" required>
            @foreach($contact_types as $key => $value)
            <option value='{{$value->id}}'>{{$value->name}}</option>
            @endforeach
          </select>
        </div>
        <div>{{$errors->first('contact_type_id')}}</div>
      </div>
      <div class="form-group col-md-3">
        <div class="form-group">
          <label for="contact_reason_id">Kontakgrund <i class="fas fa-asterisk" style="color:#993955"></i></label>
          <select name="contact_reason_id" class="form-control">
            @foreach($contact_reasons as $reason)
            <option value="{{ $reason->id }}" {{$reason->id == $communication->reason_id ? 'selected' : '' }}>{{ $reason->name }}</option>
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
          <label for="contact_id">Ansprechpartner <i class="fas fa-asterisk" style="color:#993955"></i></label>
          <select name="contact_id" class="form-control">
            @foreach($contacts as $contact)
            <option value="{{ $contact->id }}" {{$contact->id == $communication->contact_id ? 'selected' : '' }}>{{ $contact->name }}</option>
            @endforeach
          </select>
        </div>
        <div>{{$errors->first('contact_id')}}</div>
      </div>
      <div class="form-group col-md-6">
        <div class="form-group">
          <label for="memo">Teilnehmer <i class="fas fa-asterisk" style="color:#993955"></i></label>
          <input type="text" name="participant" class="form-control" value="{{ old('participant') ?? $communication->participant}}" autocomplete="off">
        </div>
        <div>{{$errors->first('participant')}}</div>
      </div>
    </div>
     {{-- line 3 --}}
     <div class="form-row ">
      <div class="form-group col-md-12">
        <div class="form-group">
          <label for="memo">Gesprächsnotiz <i class="fas fa-asterisk" style="color:#993955"></i></label>
          <textarea id="mytextarea" type="text" cols="120" rows="30" name="note" class="form-control" value="" autocomplete="nope">{{ old('note') ?? $communication->note }}</textarea>
        </div>
        <div>{{$errors->first('participant')}}</div>
      </div>
    </div>
  
  
</fieldset>