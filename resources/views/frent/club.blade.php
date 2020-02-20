@extends('layouts.frent')
@section('css')
<style type="text/css">
    .table {
   
}
</style>
@endsection

@section('content')
 <div class="container">
        <div class="row">
            <!--MAIN Content-->
            <div class="col-md-12">
                <div id="page-main">
                    <section id="members">
                        <header><h1>Club Detail</h1></header>
                        <div class="author-block member-detail" style="    display: grid;">
                            <figure class="author-picture" style="    justify-self: center;"><img style="width: 75%;" src="{{ url('images/' . $club->photo) }}" alt=""></figure>
                            <div class="paragraph-wrapper">
                                <div class="inner">
                                    <header><h2>{{$club->name}}</h2>
                                        @if($club->mombre == 0)
                                      <a href="#"  class="btn btn-framed btn-color-grey btn-small"> inscreption</a></header>
                                      @endif
                                    <figure>{{$etudiant->prenom}} {{$etudiant->name}}</figure>
                                    <hr>
                                    
                               
                                 
                                 
                                    <h3>Responsable Club </h3>
                                    <div class="table-responsive">
                                        <table class="table table-hover">
                                            <thead>
                                            <tr>
                                                <th class="Photo">Photo</th>
                                                <th>Course Name</th>
                                                <th class="Post">Post</th>
                                                
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                                 <td class="margin">
                                @if($etudiant->photo == null)
                                <img src="https://images.squarespace-cdn.com/content/v1/5accd58989c17259a7bc8808/1567774856523-4AU5CG7TK1EH74BKGLBM/ke17ZwdGBToddI8pDm48kAf-OpKpNsh_OjjU8JOdDKBZw-zPPgdn4jUwVcJE1ZvWQUxwkmyExglNqGp0IvTJZUJFbgE-7XRK3dMEBRBhUpwkCFOLgzJj4yIx-vIIEbyWWRd0QUGL6lY_wBICnBy59Ye9GKQq6_hlXZJyaybXpCc/placeholder-m+%281%29.png?format=300w" style="border-radius: 50%;height:100px;width:100px;"> 
                                @else
                                <img src="{{ url('thumbs/' . $etudiant->photo) }}" style="border-radius: 50%;height:100px;width:100px;"> 
                                @endif
                     </td>
                            <td>{{ $etudiant->name }} {{ $etudiant->prenom }}</td> 
                            <td>president</td>


                                            </tr>
  @foreach($classeFormations as $classeFormation)
                        <tr>
                              <td class="margin">
                                @if(optional($classeFormation->etudiant)->photo == null)
                                <img src="https://images.squarespace-cdn.com/content/v1/5accd58989c17259a7bc8808/1567774856523-4AU5CG7TK1EH74BKGLBM/ke17ZwdGBToddI8pDm48kAf-OpKpNsh_OjjU8JOdDKBZw-zPPgdn4jUwVcJE1ZvWQUxwkmyExglNqGp0IvTJZUJFbgE-7XRK3dMEBRBhUpwkCFOLgzJj4yIx-vIIEbyWWRd0QUGL6lY_wBICnBy59Ye9GKQq6_hlXZJyaybXpCc/placeholder-m+%281%29.png?format=300w" style="border-radius: 50%;height:100px;width:100px;"> 
                                @else
                                <img src="{{ url('thumbs/' . optional($classeFormation->etudiant)->photo) }}" style="border-radius: 50%;height:100px;width:100px;"> 
                                @endif
                     </td>
                           
                            <td>{{ optional($classeFormation->etudiant)->name }} {{ optional($classeFormation->etudiant)->prenom }}</td>
                            <td>{{ $classeFormation->post }}</td>

                        </tr>
                    @endforeach

                                       
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </article>
                        </div><!-- /.author -->
                    </section>
                </div><!-- /#page-main -->
            </div><!-- /.col-md-8 -->

         
        </div><!-- /.row -->
    </div><!-- /.container -->



     <div class="container">
        <div class="row">
            <!--MAIN Content-->
            <div class="col-md-12" style="min-height: 1540px;">
                <div id="page-main">
                   <section class="events images" id="events">
                        <header><h1>Historique Club</h1></header>
                        <div class="section-content">

                            @foreach($posts as $post)
                       



                              <article class="event">
                                <div class="event-thumbnail">
                                    <figure class="event-image">
                                        <div class="image-wrapper"><img src="{{ url('thumbs/' . $post->photo) }}" style="height: -webkit-fill-available;"></div>
                                    </figure>
                                    <figure class="date">
                                        <div class="month">{{$post->month}}</div>
                                        <div class="day">{{$post->day}}</div>
                                    </figure>
                                </div>
                                <aside>
                                    <header>
                                        <a href="#">{{$post->Titre}} </a>
                                    </header>
                                    <div class="additional-info"><span class="fa fa-map-marker"></span>{{$post->lieu}}</div>
                                    <div class="description">
                                        <p>{{$post->description}}
                                        </p>
                                    </div>
                                    <a href="#" style="    visibility: hidden;" class="btn btn-framed btn-color-grey btn-small"></a>
                                </aside>
                            </article><!-- /.event -->

                            @endforeach

                        </div><!-- /.section-content -->
                    </section><!-- /.events -->
                    <div class="center">
                        {!! $posts->render() !!}
                    </div>
                    <hr>
                      <section class="events" id="events">
                        <header><h1>Events</h1></header>
                      
                        <div class="section-content">

                            @foreach($evenements as $evenement)
                            <article class="event">
                                <figure class="date">
                                    <div class="month">{{$evenement->month}}</div>
                                    <div class="day">{{$evenement->day}}</div>
                                </figure>
                                <aside>
                                    <header>
                                       <h3>{{$evenement->Name}}</h3>
                                    </header>
                                    <div class="additional-info"><span class="fa fa-map-marker"></span> {{$evenement->Lieu}}</div>
                                   
                                   
                                </aside>
                            </article><!-- /article -->

                            @endforeach

                        </div><!-- /.section-content -->
                    </section><!-- /.events -->
                    <div class="center">
                        {!! $evenements->render() !!}
                    </div>

                </div><!-- /#page-main -->
            </div><!-- /.col-md-8 -->

          
        </div><!-- /.row -->
    </div><!-- /.container -->

      </section>

</div>



    @endsection