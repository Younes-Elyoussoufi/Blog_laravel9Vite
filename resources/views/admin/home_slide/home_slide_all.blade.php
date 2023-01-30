@extends('admin.adminMaster')

@section('admin')


    <div class="page-content">
        <div class="container-fluid">
<div class="row">
    <div class="col-lg-12">
        <div class="card d-flex justify-content-center" >
     <h2 class="text-center"> Home Slide Page  </h2>
    
            <form  method='post' action=" {{route('update.slide',$HomeSlider->id)}} "  class="form-group p-4" enctype='multipart/form-data' >
                @csrf
                @method('PUT')
                <h4 class="card-title"> title :</h4>
                    
                    <input class="form-control mt-3 mb-2" type="text" placeholder="Artisanal kale" name="title"
                    value="{{$HomeSlider->title}}" id="example-text-input">
              
                <h4 class="card-title">short title: </h4>
                   
                    <input class="form-control mt-3 mb-2" type="text" placeholder="Artisanal kale" name="short_title"
                    value="{{$HomeSlider->short_title}}" id="example-text-input">
                  
                   
                    <h4 class="card-title"> video url :</h4>
                    
                    <input class="form-control mt-3 mb-2" type="text" placeholder="Artisanal kale" name="video_url"
                    value="{{$HomeSlider->video_url}}" id="example-text-input">

                    <h4 class="card-title">image: </h4>
                
                    <input class="form-control mt-3" type="file" placeholder="Artisanal kale" name="home_slid"
                        id="image">
                    <div class="row">
                        <div class="col-sm-10">
                          <img width="100" height="120" class="my-3" src="{{ (!empty($HomeSlider->home_slid) ) ? 
                          url('upload/home_slide/'.$HomeSlider->home_slid):url('upload/no_image.jpg') }}" alt="" srcset="">
                        </div>
                    </div>
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