<script>

  $('#edit').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget)
    var id = button.data('id')//<-- #id 
    var contact_title_id = button.data('contact_title_id') 
    var contact_status_id = button.data('contact_status_id') 
    var first_name = button.data('first_name') 
    var last_name = button.data('last_name') 
    var email = button.data('email') 
    var phone = button.data('phone') 
    var fax = button.data('fax') 
    var note = button.data('note') 
  
    var modal = $(this)
    modal.find('.modal-body #contact_title_id').val(contact_title_id);
    modal.find('.modal-body #first_name').val(first_name);
    modal.find('.modal-body #last_name').val(last_name);
    modal.find('.modal-body #email').val(email);
    modal.find('.modal-body #phone').val(phone);
    modal.find('.modal-body #fax').val(fax);
    modal.find('.modal-body #contact_status_id').val(contact_status_id);
    modal.find('.modal-body #note').val(note);
    modal.find('.modal-body #id').val(id);
                          //input field id
  });
  
  $('#delete').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget)
    var id = button.data('id')//<-- #id 
  
    var modal = $(this)
    modal.find('.modal-body #id').val(id);
                          //input field id
  });
  
  
  $('#exampleModal').on('shown.bs.modal', function () {
    $('#myInput').trigger('focus')
  })
  
  </script>
  