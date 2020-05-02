@extends('layouts.app')
<style>
#header {
    position: relative;
    text-align: center;
}
th , tr , td {
  text-align: center;
}
#header h1 {
    display: inline;
}

#header #buttons {
    position: absolute;
    left: 0;
    top: 0;
}

#header #logo {
    position: absolute;
    right: 0;
    top: 0;
}
</style>
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md">
            <div class="card">
                <div class="card-header">Admin Dashboard</div>
                <div class="card-body">
                  <div  id="header">
                    <div id="buttons">
                    </div>
                    <h1>Employees</h1>
                    <div id="logo">
                      <a href="{{route('create-employee')}} " class="btn btn-primary btn-bg m-0">Add Employee</a>  
                    </div>
                  </div>
                  <table class="table table-striped table-responsive-md btn-table">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Firstname</th>
                        <th>Lastname</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Company</th>
                        <th style="text-align:center">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                    @foreach ($emps as $emp)
                      <tr>
                        <th scope="row">{{$emp->id}}</th>
                        
                        <td>{{$emp->firstname}}</td>
                        <td>{{$emp->lastname}}</td>
                        <td>{{$emp->email}}</td>
                        <td>{{$emp->phone}}</td>
                        <td>{{$emp->company->name}}</td>
                        <td style="text-align:center">
                          {{-- <a href="{{ action('CompaniesController@destroy', ['id' => $company->id]) }}" class="btn btn-danger btn-sm m-0" >Delete</a> --}}
                          
                          <form action="{{ Route('delete-employee', [$emp->id]) }}" method="post">
                            <input class="btn btn-default" type="hidden" value="Delete" />
                            @method('delete')
                            @csrf 
                            <a href="/admin/employee/{{$emp->id}}" class="btn btn-success btn-sm m-0">Edit</a>
                            <button class="btn btn-danger btn-sm m-0" type="submit">Delete</button>               

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
</div>
@endsection
