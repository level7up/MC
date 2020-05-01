@extends('layouts.app')
<style>
#header {
    position: relative;
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
                    <h1>Companies</h1>
                    <div id="logo">
                      <a href="{{route('create-company')}} " class="btn btn-primary btn-bg m-0">Add Company</a>  
                    </div>
                  </div>
                  <table class="table table-striped table-responsive-md btn-table">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Logo</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Website</th>
                        <th style="text-align:center">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                    @foreach ($companies as $company)
                      <tr>
                        <th scope="row">{{$company->id}}</th>
                        <th><img src="{{asset('images/logos/'.$company->logo.'')}}"style=" border-radius:50%" height="70px" width="70px"></th>
                        <td>{{$company->name}}</td>
                        <td>{{$company->email}}</td>
                        <td>{{$company->website}}</td>
                        <td>
                          <button type="button" class="btn btn-success btn-sm m-0">Edit</button>
                          <button type="button" class="btn btn-danger btn-sm m-0">Delete</button>
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
