@csrf
<input type="hidden" name="company_id" value="{{ $company_id ?? '' }} "> 
<fieldset class="border rounded px-2 mb-2">
  <legend class="w-auto">Ansprechpartner</legend>
 <input class="form-control lead pull-right" type="text" placeholder="Datum angelegt:  Today von Matoyan" readonly> 

  <div class="form-row ">
     <div class="form-group col-md-2">
      <div class="form-group">
        <label for="contact_title_id">Anrede <i class="fas fa-asterisk" style="color:#993955"></i></label>									
        <select name="contact_title_id" class="form-control">
          <option  selected="true" disabled="disabled" value=''>Bitte wählen...</option>
          @foreach($contact_titles as $title)
          <option value="{{ $title->id }}" {{ $title->id == $contact->title_id ? 'selected' : '' }} >{{ $title->name }}</option>
          @endforeach
        </select>
      </div>
      <div>{{$errors->first('contact_title_id')}}</div>
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
         <label for="contact_status">Status <i class="fas fa-asterisk" style="color:#993955"></i></label>									
         <select name="contact_status_id" class="form-control" required>
          <option  selected="true" disabled="disabled" value=''>Bitte wählen...</option>
           @foreach($contact_statuses as $status)
           <option value="{{$status->id}}"{{ $status->id == $contact->status_id ? 'selected' : '' }}>{{ $status->name }}</option>
           @endforeach
         </select>
       </div>
       <div>{{$errors->first('contact_status_id')}}</div>
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