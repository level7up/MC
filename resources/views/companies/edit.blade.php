@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Admin Dashboard</div>
                <div class="card-body">
                  <h4>Edit Company</h4>

                  <form id="" class="form" method="POST" action="{{route('update-company', $company->id)}}" enctype="multipart/form-data">
                    {{csrf_field()}}
                    @method('PUT')

                      <div class="form-group">
                        <label for="NameInput">Company Name<span>*</span></label>
                        <input name="name" type="text" value="{{$company->name}}" class="form-control" id="NameInput" placeholder="">
                      </div>

                      <div class="form-group">
                        <label for="EmailInput">Email<span>*</span></label>
                        <input name="email" type="email" value="{{$company->email}}" class="form-control" id="EmailInput" placeholder="example@example.com">
                      </div>

                      <div class="form-group">
                        <label for="siteInput">Website</label>
                        <input name="website" type="text" value="{{$company->website}}" class="form-control" id="siteInput" placeholder="www.Example.com">
                      </div>

                      <div class="form-group">
                        <label for="image">image</label>
                        <input name="image" value="{{$company->logo}}" type="file" >
                      </div>	
                      <div class="col-lg-7 text-center">
                        <button class="addArtSubmit-btn" type="submit">Update Art</button>
                    </div>
                      
                  </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
