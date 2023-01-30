@extends('admin.adminMaster')

@section('admin')


    <div class="page-content">
        <div class="container-fluid">
<div class="row">
    <div class="col-lg-12">
        <div class="card d-flex justify-content-center" >

    <img class="rounded-circle avatar-x1 img-fluid" style="width:150px;height: 150px; margin:auto" 
    src="{{asset('profile/'.$profile->image)}}" id="showImage" alt="Card image cap">

            <form  method='post' action="{{route('admin.profile.update')}}"  class="form-group p-4" enctype='multipart/form-data' >
                @csrf
                @method('PUT')
                <h4 class="card-title"> name :</h4>
               
                    <input class="form-control mt-3 mb-2" type="text" placeholder="Artisanal kale" name="name"
                    value="{{$profile->name}}" id="example-text-input">
              
                <h4 class="card-title">email: </h4>
                
                    <input class="form-control mt-3 mb-2" type="email" placeholder="Artisanal kale" name="email"
                    value="{{$profile->email}}" id="example-text-input">
                    <h4 class="card-title">image: </h4>
                
                    <input class="form-control mt-3" type="file" placeholder="Artisanal kale" name="image"
                    value="" id="image">
                

                <button type='submit' class="btn btn-info btn-rounded form-control mt-3">update profile</button>
               
            </form>

        </div>
    </div>
    
</div>
</div>
</div>

<script type="text/javascript">
  
  $(document).ready(function(){
    $('#image').change(function(e){
        var reader=new FileReader();
        reader.onload=function(e){
           $('#showImage').attr('src',e.target.result)
        }
        reader.readAsDataURL(e.target.files['0']);
    })  }

  )

</script>

@endsection