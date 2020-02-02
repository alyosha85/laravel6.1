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
      
      <div>
        <p><a href="/companies/create" class="btn btn-outline-primary" >Neue Firma</a>
        <select  class ="selectpicker" data-style="btn btn-outline-primary" name="type" id="type">
          <option value="city">Standort</option>
          <option value="state">Land</option>
          <option value="all">Bundesweit</option>
        </select>
      </p>
      </div>

        {{-- <select class ="selectpicker float-right" data-style="btn btn-outline-primary" id="limit" name="limit">
            <option value="10">10 Entries per page</option>
            <option value="20">20 Entries per page</option>
            <option value="30">30 Entries per page</option>
            <option value="50">50 Entries per page</option>
        </select> --}}
        <br>

   
      <div class="table-responsive-xl">
        <table class="table" id="myTable">
          <thead>
            <tr>
              <th>Firma</th>
              <th>Branche</th>
              <th>Tätigkeit</th>
              <th>Status</th>
              <th>Telefon</th>
              <th>E-mail</th>
              <th>Standort</th>
              <th>Anschrift</th>
              <th></th>
            </tr>
            <tr>
              <th></th>
              <th>Branche</th>
              <th>Tätigkeit</th>
              <th>Status</th>
              <th></th>
              <th></th>
              <th></th>
              <th></th>
              <th></th>
          </thead>
          <tbody>
            @foreach($companies as $company)
            <tr>
              <td>{{$company->name}}</td>
              <td>{{$company->branch->name}}</td>
              <td>
                @foreach ($company->professions as $profession)
                {{$profession->name}}, &nbsp;
                @endforeach
              </td>
              <td class="text-center">{{$company->status->name}}</td>
              <td>{{$company->phone}}</td>
              <td>{{$company->email}}</td>
              <td>
                @foreach ($company->cities as $city)
                  {{$city->name}}, &nbsp;
                @endforeach 
              </td> 
              <td>{{$company->address}}</td>
              <td>
                <form action="/companies/{{$company->id}}" method="POST" id="companydelete{{$company->id}}"> 
                <a href="/companies/{{ $company->id }}" class="btn btn-outline-primary btn-sm border-0"><i class="fas fa-eye"></i></a>
                <a href="/companies/{{ $company->id }}/edit" class="btn btn-outline-primary btn-sm border-0"><i class="fas fa-edit"></i></a>
                  @method('DELETE')
                  @csrf
                <button type="button" onclick="company_delete({{$company->id}})" data-confirm="Sind Sie sicher, dass Sie löschen möchten?" class="btn btn-outline-danger btn-sm border-0"><i class="fas fa-trash"></i></button>
                </form>
                
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
{{-- 
        <div class="float-left">
          showing {!! $companies->count() !!} of {!! $companies->total() !!}
        </div>
        <div class="float-right">
          {!! $companies->links() !!}
        </div> --}}
      </div>

    </div>
  </div>
</div>

@endsection

@section('foot')


<script>
//datatable   
$(document).ready(function() {

  $(document).on('click', '.pagination li a', function (e) {
    e.preventDefault();
    if ($(this).attr('href')) {
        var queryString = '';
        var allQueries = window.location.href.slice(window.location.href.indexOf('?') + 1).split('&');
        if(allQueries[0].split('=').length >1){
            for (var i = 0; i < allQueries.length; i++) {
                var hash = allQueries[i].split('=');
                if (hash[0] !== 'page') {
                    queryString += '&' + hash[0] + '=' + hash[1];
                }
            }
        }
        window.location.replace($(this).attr('href') + queryString);
    }
});

$('#limit').on('change',function(){
  location.href='/companies?limit='+$(this).val();
});
  $('#limit').val("{{$companies->count() ?? 10}}");


$('#type').on('change',function(){
  location.href='/companies?type='+$(this).val();
});
$('#type').val("{{$type ?? 'city'}}");

var table = $('#myTable').DataTable({
  "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
    orderCellsTop: true,
    bStateSave: false,
    // paging: false,
    // bInfo: false,
    dom: 'Bfrtip',
    columnDefs : [
   { targets : [3],
     render : function(data, type, row) {
        return '<span class="badge badge--'+data+'">'+data+'</span>'
     }     
   }
],
    buttons: [
                {

                // print in landscape script
                extend: "print", text:'Drucken',
                customize: function(win)
                    {
                        var last = null;
                        var current = null;
                        var bod = [];
                        var css = '@page { size: landscape; }',
                            head = win.document.head || win.document.getElementsByTagName('head')[0],
                            style = win.document.createElement('style');
                        style.type = 'text/css';
                        style.media = 'print';
                        if (style.styleSheet)
                        {
                            style.styleSheet.cssText = css;
                        }
                        else
                        {
                            style.appendChild(win.document.createTextNode(css));
                        }
                        head.appendChild(style);
                    }
            
                },
                //select col visibility
                {
                    extend: 'colvis',
                    text:'Spalten Anzeigen'  
                },
                {
                  extend: 'copy',
                  text: 'Kopieren'
                  
                },
                {
                  extend: 'excel',
                }
            ],
//end buttons ......................................................end buttons
//drag and drop columns
colReorder: true,
//German language 
 "language": {
            "url": "https://cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/German.json"
            }, 	
            
//drop down select
initComplete: function () {

  this.api().columns(2).every( function () {                    
      var column = this;                    
      var select = $('<select><option value=""></option></select>')                        
      .appendTo( $("#myTable thead tr:eq(1) th").eq(column.index()).empty() )                        
      .on( 'change', function () {                            
        var val = $.fn.dataTable.util.escapeRegex($(this).val());                            
        column.search( val ? val : '', true, false ).draw();                        
        } );                        
        @foreach($values as $value)                            
        select.append( '<option value="{{$value->name}}">{{$value->name}}</option>' );                        
        @endforeach                
        } ); 


        this.api().columns([1,3]).every( function () {
            var column = this;
            var select = $('<select><option value=""></option></select>')
                .appendTo( $("#myTable thead tr:eq(1) th").eq(column.index()).empty() )
                .on( 'change', function () {
                    var val = $.fn.dataTable.util.escapeRegex(
                        $(this).val()
                    );
                    column
                        .search( val ? '^'+val+'$' : '', true, false )
                        .draw();
                } );
            column.data().unique().sort().each( function ( d, j ) {
                select.append( '<option value="'+d+'">'+d+'</option>' );
            } );
        } );
  } //initComplete function  
    
    });
});

</script>   

<script>  
new jBox('Confirm', {
  confirmButton: 'Ja !', 
  cancelButton: 'Nein'
}); 
		function company_delete(id){ 
          $( "#companydelete"+id ).submit();	
          }		
</script>  

    
@endsection
     


