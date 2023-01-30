@extends('admin.adminMaster')

@section('admin')


    <div class="page-content">
        <div class="container-fluid">
<div class="row">
    <div class="col-lg-12">
        <div class="card d-flex justify-content-center" >

          <h2 class="text-center"> change password</h2>
       
          @if ($errors->any())
          <div class="alert alert-danger">
              <ul>
                  @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                  @endforeach
              </ul>
          </div>
      @endif

      @if(session('success'))
        <div class="alert alert-success">
            {!! session('success') !!}
        </div>
      @endif

@if(session('error'))
        <div class="alert alert-danger">
            {!! session('error') !!}
    </div>
    @endif
            <form  method='post' action="{{route('admin.updatePasswod')}}"  class="form-group p-4"  >
                @csrf
   
                <h4 class="card-title"> old password :</h4>
               
                    <input class="form-control mt-3 mb-2" type="password" placeholder="Artisanal kale" name="oldPassword"
                     id="example-text-input">
              
                <h4 class="card-title">new Password: </h4>
                
                    <input class="form-control mt-3 mb-2" type="password" placeholder="Artisanal kale" name="newPassword"
                 id="example-text-input">
                    <h4 class="card-title">confirm Password: </h4>
                
                    <input class="form-control mt-3" type="password" placeholder="Artisanal kale" name="confirmPassword"
                    value="" id="image">
                

                <button type='submit' class="btn btn-info btn-rounded form-control mt-3">update password</button>
               
            </form>

        </div>
    </div>
    
</div>
</div>
</div>



@endsection