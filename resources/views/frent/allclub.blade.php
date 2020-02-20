@extends('layouts.frent')
@section('css')

</style>
@endsection

@section('content')
 



     <div class="container">
        <div class="row">
            <!--MAIN Content-->
            <div class="col-md-12" style="min-height: 1540px;">
                <div id="page-main">
                   <section class="events images" id="events">
                        <header><h1> Club</h1></header>
                        <div class="section-content">

                            @foreach($clubs as $club)
                       



                              <article class="event">
                                <div class="event-thumbnail">
                                    <figure class="event-image">
                                        <div class="image-wrapper"><img src="{{ url('thumbs/' . $club->photo) }}"></div>
                                    </figure>
                                    <figure style="    visibility: hidden;"  class="date">
                                        <div  class="month">s</div>
                                        <div  class="day">s</div>
                                    </figure>
                                </div>
                                <aside>
                                    <header>
                                        <a  href="{{url('/clubshow',$club->id)}}">{{$club->name}}</a>
                                    </header>
                                    <div style="    visibility: hidden;"  class="additional-info">sdf</div>
                                    <div class="description">
                                        <p>{{ optional($club->etudiant)->prenom }} {{ optional($club->etudiant)->name }}
                                        </p>
                                    </div>
                                    <a href="#" style="    visibility: hidden;" class="btn btn-framed btn-color-grey btn-small"></a>
                                </aside>
                            </article><!-- /.event -->

                            @endforeach

                        </div><!-- /.section-content -->
                    </section><!-- /.events -->
                    <div class="center">
                        {!! $clubs->render() !!}
                    </div>
                    <hr>
                   

                </div><!-- /#page-main -->
            </div><!-- /.col-md-8 -->

          
        </div><!-- /.row -->
    </div><!-- /.container -->

      </section>

</div>



    @endsection