@extends('layouts.app')
@section('css')
   <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
<style type="text/css">
    .badge-danger{
        background-color: #dc3545!important;
    }

.badge-success {
    color: #fff;
    background-color: #28a745!important;
}
</style>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>

<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
<style>
.product-slider {  }

.product-slider #carousel { border: 4px solid #1089c0; margin: 0; }

.product-slider #thumbcarousel { margin: 12px 0 0; padding: 0 45px; }

.product-slider #thumbcarousel .item { text-align: center; }

.product-slider #thumbcarousel .item .thumb { border: 4px solid #cecece; width: 20%; margin: 0 2%; display: inline-block; vertical-align: middle; cursor: pointer; max-width: 98px; }

.product-slider #thumbcarousel .item .thumb:hover { border-color: #1089c0; }

.product-slider .item img { width: 100%; height: auto; }

.carousel-control { color: #0284b8; text-align: center; text-shadow: none; font-size: 30px; width: 30px; height: 30px; line-height: 20px; top: 23%; }

.carousel-control:hover, .carousel-control:focus, .carousel-control:active { color: #333; }

.carousel-caption, .carousel-control .fa { font: normal normal normal 30px/26px FontAwesome; }
.carousel-control { background-color: rgba(0, 0, 0, 0); bottom: auto; font-size: 20px; left: 0; position: absolute; top: 30%; width: auto; }

.carousel-control.right, .carousel-control.left { background-color: rgba(0, 0, 0, 0); background-image: none; }
</style>  
<!---->
 
 <link href="{{ asset('css/jquery-confirm.css') }}" rel="stylesheet">
  <link href="{{ asset('css/jquery-confirm.less') }}" rel="stylesheet">
   <link href="{{ asset('dist/jquery-confirm.css') }}" rel="stylesheet">
    <link href="{{ asset('dist/jquery-confirm.js') }}" rel="stylesheet">

  <style type="text/css">
    input[type=file]{
      display: inline;
    }
    #image_preview{
      border: 1px solid black;
      padding: 10px;
    }
    #image_preview img{
      width: 200px;
      padding: 5px;
    }
  </style>
@stop
@section('content')

    <div class="panel panel-default">
  
        <div class="panel-heading clearfix">

            <div class="pull-left">
                <h4 class="mt-5 mb-5">{{ !empty($title) ? $title : 'Post' }}</h4>
            </div>
            <div class="btn-group btn-group-sm pull-right" role="group">

                <a href="{{ route('posts.post.index') }}" class="btn btn-primary" title="Show All Post">
                    <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                </a>

                <a href="{{ route('posts.post.create') }}" class="btn btn-success" title="Create New Post">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                </a>

            </div>
        </div>

        <div class="panel-body">

            @if ($errors->any())
                <ul class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif

            <form method="POST" action="{{ route('posts.post.update', $post->id) }}" id="edit_post_form" name="edit_post_form" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
            {{ csrf_field() }}
            <input name="_method" type="hidden" value="PUT">
            @include ('posts.form', [
                                        'post' => $post,
                                      ])

                <div class="form-group">
                    <div class="col-md-offset-2 col-md-10">
                        <input class="btn btn-primary" type="submit" value="Update">
                    </div>
                </div>
            </form>

        </div>
    </div>





        <div class="panel panel-default">
  
        <div class="panel-heading clearfix">

            <div class="pull-left">
                <h4 class="mt-5 mb-5">Post Image</h4>
            </div>
            <div class="btn-group btn-group-sm pull-right" role="group">

              

            </div>
        </div>

        <div class="panel-body">
     <br><br>
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
           
              <li class=""><a href="#img" data-toggle="tab">Post Image</a></li>
              <li><a href="#add_img" data-toggle="tab">Add image</a></li>
            
            </ul>
            <div class="tab-content">
              <div class="active tab-pane" id="img">
     <div class="product-slider">
  <div id="carousel" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
@foreach($images as $key => $image)
@if($key == 0)
      <div class="item active"> <center><img style="width:auto;height:400px;" src="{{ url('images/' . $image->photo) }}"></center> </div>
@else
      <div class="item"> <center><img style="width:auto;height:400px;" src="{{ url('thumbs/' . $image->photo) }}"></center> </div>
@endif
@endforeach

    </div>
  </div>
  <div class="clearfix">
    <div id="thumbcarousel" class="carousel slide" data-interval="false">
      <div class="carousel-inner">
        <div class="item active">
      
@foreach($images as $key => $image)


     
     
          <div  style="position: relative; left: 0; top: 0;   " data-target="#carousel" data-slide-to="{{$key}}" class="thumb"><img src="{{ url('thumbs/' . $image->photo) }}" >
          
          <button style="position:absolute;bottom:0px;right:0px;" class="deleteimage" value="{{$image->id}}" ><i class="fa fa-trash"></i></button>
          </div>
     @endforeach          <!-- ;-->
          


        </div>

      </div>
      <!-- /carousel-inner --> 
      <a class="left carousel-control" href="#thumbcarousel" role="button" data-slide="prev"> <i class="fa fa-angle-left" aria-hidden="true"></i> </a> <a class="right carousel-control" href="#thumbcarousel" role="button" data-slide="next"><i class="fa fa-angle-right" aria-hidden="true"></i> </a> 
      </div>
    <!-- /thumbcarousel --> 
    
  </div>
</div>


              </div>
    
              

              <div class="tab-pane" id="add_img">
                  


<form  id="addf" enctype="multipart/form-data" >

    <center>
        <img id="blah" src="http://luxesocietyasia.com/wp-content/uploads/2018/06/La-Barbershop.jpg" alt=" " style="height:260px;width:260px;border-radius: 50%;border-style: solid;border-width:2px;border-color:#3C8DBC;" /><br><br>
    <input hidden type="text" name="idxx" value="{{$post->club_id}}" >
<input type='file' name="fileimage" id="fileimage" class="form-control" onchange="read(this);" required  /><br>
<input type="hidden" id="_token" value="{{ csrf_token() }}">

<br><br>
<button type="button" id="cbn" class="btn btn-primary btn-block"><i class="fa fa-plus-circle" ></i> Add image to Post</button>
</center>
</form>





              </div>
              <!-- /.tab-pane -->
    
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
        


@endsection
@section('js')
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.4.min.js"></script>

<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
<script src="http://code.jquery.com/jquery-latest.js"></script>
<script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
<script src="{{ asset('js/jquery-confirm.js') }}"></script>

 <script type="text/javascript">
    $(document).ready(function() {
   $('#cbn').click(function(e) {
    
         e.preventDefault();
    var formData = new FormData();
        var files = $("#fileimage").get(0).files;
        
 var _token = $('input#_token').val();

        formData.append("photo", files[0]);
        formData.append("post",{{ $post->id }} );
       
        formData.append("_token", _token);
         $.ajax({
  headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
            type:'POST',
               url:'{{Route('addimage')}}',
                data: formData,

      
             cache: false,
            contentType: false,
            processData: false,
           
               success: function (data)
               {
          $.alert({
        theme: 'dark',
        title: 'Alert!',
        content: 'Image inserted successfuly !',
    });
          location.reload();       
  

               }
            })

     });




$(".deleteimage").click(function() {
    var i = $(this).val(); 
var me = $(this);
var formData = new FormData();
  var _token = $('input#_token').val();
  formData.append("_token", _token);
  formData.append("id", i);

  $.confirm({
    title: 'Are you sure ?',
    content: 'Delete this image from salon gallery !',
    buttons: {
        confirm: function () {
                    $.ajax({

                       headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
            url: '{{Route('deleteimage')}}',
            type: "POST",
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
           
            dataType: "html",
            success: function (datas) {
     
                 me.attr("disabled", true);me.text("DELETED");
    
                 $.alert('Image deleted !');
                 window.setTimeout(function(){location.reload()},2000);
                
                
            },
            error: function (xhr, ajaxOptions, thrownError) {
                alert("Error deleting!");
                
            }
        });
         },
        cancel: function () {
           
        }

    }
});

});

});

 function read(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('#blah')
                    .attr('src', e.target.result);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
      


 
 </script>
@endsection