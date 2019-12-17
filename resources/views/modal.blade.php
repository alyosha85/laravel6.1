<div class="modal right fade" tabindex="-1" id="edit" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">{{$contact->first_name ?? ''}} &nbsp {{$contact->last_name ?? ''}}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{route('contact.update','test')}}" method="POST">
        {{method_field('PATCH')}}
      <div class="modal-body">
        <input type="hidden" name="company_id" value="{{$company->id}}">
        <input type="hidden" name="id" id="id" value="">
      @include('contact.show')
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-primary">Save changes</button>
      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    </div>
  </div>
</div>
</div>