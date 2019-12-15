@extends('layouts.app')

@section('content')

<div class="container-fluid">
  <div class="row">
    <div class="col-md-12">
      
      <div>
        <p><a href="/companies/create" class="btn btn-outline-primary border-0" >Add company</a></p>
      </div>
   
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
            </tr>
          </thead>
          <tbody>
            @foreach($companies as $company)
            <tr>
              <td>{{$company->name}}</td>
              <td>{{$company->branch->name}}</td>
              <td>
                @foreach($company->professions as $profession)
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
                <a href="/companies/{{ $company->id }}" class="btn btn-outline-primary btn-sm border-0"><i class="fas fa-eye"></i></a>
                <a href="/companies/{{ $company->id }}/edit" class="btn btn-outline-primary btn-sm border-0"><i class="fas fa-edit"></i></a>
                <form action="/companies/{{$company->id}}" method="POST">
                  @method('DELETE')
                  @csrf
                  <button type="submit" class="btn btn-outline-danger btn-sm border-0"><i class="fas fa-trash"></i></button>
                </form>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>

    </div>
  </div>
</div>

@endsection

@section('foot')


<script>
//datatable   
$(document).ready(function() {
var table = $('#myTable').DataTable({
    orderCellsTop: true,
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
                    extend: 'colvis',text:'Spalten Anzeigen'  
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
    
@endsection
     


