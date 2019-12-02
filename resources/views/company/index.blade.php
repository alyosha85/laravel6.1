@extends('layouts.app')

@section('content')

<div class="container-fluid">
  <div class="row">
    <div class="col-md-12">
   
      <div class="table-responsive-xl">
        <table class="table" id="company_table">
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
              <th></th>
              <th></th>
              <th></th>
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
              <td>{{$company->branch['name']}}</td>
              <td>
                @foreach($company->professions as $profession)
                {{$profession['name']}}, &nbsp;
                @endforeach
              </td>
              <td>{{$company->status['name']}}</td>
              <td>{{$company->phone}}</td>
              <td>{{$company->email}}</td>
              <td>
                @foreach ($company->cities as $city)
                  {{$city['name']}}, &nbsp;
                @endforeach 
              </td> 
              <td>{{$company->address}}</td>
              <td>
                <a href="{{url('company/'.$company->id)}}" class="btn btn-primary btn-sm"><i class="fas fa-eye"></i></a>
                <a href="{{url('company/'.$company->id.'/edit')}}" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>
                <a href="#" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
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