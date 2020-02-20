@extends('layouts.frent')

@section('content')

<!-- Page Content -->



 <div class="container">
        <div class="row">
            <!--MAIN Content-->
            <div class="col-md-8" style="min-height: 1154px;">
                <div id="page-main">
                    <section id="about">
                        <header><h1>{{ $post->Titre}}</h1></header>
                        <img src="{{ url('images/' . $post->photo) }}">
                        <h2>Mission &amp; Purpose</h2>
                        <p>
                            <p>{{$post->description}}
                        </p>
                      
                        <h2>Gallery</h2>
                        <div>
                            <ul class="gallery-list">
                                @foreach($images as $key => $image)

                                <li><a href="{{ url('images/' . $image->photo) }}" class="image-popup"><img src="{{ url('thumbs/' . $image->photo) }}" alt=""></a></li>

                                @endforeach
                                
                            </ul>
                          
                        </div>
                       
                    </section>
                </div><!-- /#page-main -->
            </div><!-- /.col-md-8 -->

       
        </div><!-- /.row -->
    </div><!-- /.container -->
</div>




<!-- end Partners, Make a Donation -->
</div>
<!-- end Page Content -->

@endsection

