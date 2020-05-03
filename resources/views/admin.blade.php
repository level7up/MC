@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Admin Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    You are logged in as Admin!<br>
                    <div>
                        <label>Companies</label>
                        <a class="btn btn-success" href="{{route('companies')}}">All Companies</a>
                        <a class="btn btn-primary" href="{{route('create-company')}}">Create Company</a>
                    </div>
                    <div style="padding-top:10px">
                        <label>Employees</label>
                        <a class="btn btn-success" href="{{route('employees')}}">All Employees</a>
                        <a class="btn btn-primary" href="{{route('create-employee')}}">Add Employee</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
