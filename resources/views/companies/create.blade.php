@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Admin Dashboard</div>
                <div class="card-body">
                  <h4>Create Company</h4>

                  <form class="form" method="post" action="{{route('store-company')}}" enctype="multipart/form-data">
                    @csrf <!-- {{ csrf_field() }} -->
                   
                      <div class="form-group">
                        <label for="NameInput">Company Name<span>*</span></label>
                        <input name="name" type="text" class="form-control" id="NameInput" placeholder="">
                      </div>

                      <div class="form-group">
                        <label for="EmailInput">Email<span>*</span></label>
                        <input name="email" type="email" class="form-control" id="EmailInput" placeholder="example@example.com">
                      </div>

                      <div class="form-group">
                        <label for="siteInput">Website</label>
                        <input name="website" type="text" class="form-control" id="siteInput" placeholder="www.Example.com">
                      </div>

                        <div class="form-group">
                            <label for="image">Logo</label><br>
                            <input name="image" type="file" >
                        </div>	
                     
                        <div  style="float:right; padding-top:10px;" class="form-group button">
                            <button type="submit" class="btn btn-primary">Publish</button>
                        </div>
                  </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
