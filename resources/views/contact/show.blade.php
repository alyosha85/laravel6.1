
  <div class="row">
    <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-body">
          <div class="col-lg-12"> 
            <div class="form-horizontal">
              <div class="form-group row">
                <label for="name" class="col-sm-3 control-label font-weight-bold">Firma:</label>
                <div class="col-sm-9">
                  <input type="Text" class="form-control" value="{{$contact->company->name}}" readonly>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                    <div class="form-group row">
                        <label for="Email" class="col-sm-3 col-form-label font-weight-bold">Email:</label>
                        <div class="col-sm-9">
                          <a class="form-control-plaintext" href="mailto:{{$contact->email}}">{{ $contact->email ?? '' }}</a>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="fax" class="col-sm-3 col-form-label font-weight-bold">Fax:</label>
                        <div class="col-sm-9">
                            <input type="text" readonly class="form-control-plaintext" value="{{ $contact->fax ?? '' }}">
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group row">
                        <label for="phone" class="col-sm-3 col-form-label font-weight-bold">Telefon:</label>
                        <div class="col-sm-9">
                          <input type="text" readonly class="form-control-plaintext" value="{{ $contact->phone ?? '' }}">
                        </div>
                    </div>
                   
                    <div class="form-group row">
                        <label for="status_id" class="col-sm-3 col-form-label font-weight-bold">Status:</label>
                        <div class="col-sm-9">
                          <input type="text" readonly class="form-control-plaintext" value="{{ $contact->status['name'] ?? '' }}">
                        </div>
                    </div>
                  </div>
              </div>
            </div>
          </div>
          <div class="col-lg-12">
            <div class="form-row">
              <div class="form-group col-md-12">
                <div class="form-group">
                  <label for="memo"> </label>
                  <textarea rows="4" id="memo" type="text" class="form-control" name="memo" value="" readonly>{{$contact->note}}</textarea>                     
                </div>
              </div>
            </div>
          </div> 
          <div class="btn-toolbar pull-right mb-5">
        </div>  
      </div>   
    </div>
  </div>
</div>
                   

            

            
