@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Admin Dashboard</div>
                <div class="card-body">
                  <h4>Create Employee</h4> 

                  <form class="form" method="POST" action="{{route('update-employee', $emp->id)}}" enctype="multipart/form-data">
                    @csrf <!-- {{ csrf_field() }} -->
                    @method('PUT')
                   
                      <div class="form-group">
                        <label for="firstname">First Name<span>*</span></label>
                        <input name="firstname" value="{{$emp->firstname}}" type="text" class="form-control" id="firstname" placeholder="">
                      </div>

                      <div class="form-group">
                        <label for="lastname">Last Name<span>*</span></label>
                        <input name="lastname" value="{{$emp->lastname}}" type="text" class="form-control" id="lastname" placeholder="">
                      </div>

                      <div class="form-group">
                        <label for="EmailInput">Email<span>*</span></label>
                        <input name="email" value="{{$emp->email}}" type="email" class="form-control" id="EmailInput" placeholder="example@example.com">
                      </div>

                      <div class="form-group">
                        <label for="siteInput">Phone Number</label>
                        <input name="phone" value="{{$emp->phone}}" type="text" class="form-control" id="siteInput" placeholder="0123456789">
                      </div>

                      <div class="form-group">
                        <label for="siteInput">Company</label>
                        <select required name="company_id" class="browser-default custom-select">
                          <option value="{{$emp->company_id}}" selected>{{$emp->company->name}}</option>
                          @foreach ($companies as $company)
                          <option value="{{$company->id}}">{{$company->name}}</option>
                          @endforeach
                          
                        </select>
                      </div>
                      
                        <div style="float:right; padding-top:10px;" class="form-group">
                            <button type="submit" class="btn btn-primary">Publish</button>
                        </div>
                  </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
