@extends('layouts.frent')

@section('content')


<!-- News, Events, About -->
<div class="block">
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-sm-6" style="min-height: 391px;">
                <section class="news-small" id="news-small">
                    <header>
                        <h2>Clubs</h2>
                    </header>
                    <div class="section-content">
                         @foreach($clubs as $key => $club)
                        <article>
                            <figure class="date"><i class="fa fa-users"></i>{{$club->created_at}}</figure>
                            <header><a href="{{url('/clubshow',$club->id)}}">{{$club->name}}</a></header>
                        </article><!-- /article -->
                        @endforeach
                        
                    </div><!-- /.section-content -->
                    <a href="{{url('/club')}}" style="color: #252525;
    display: inline-block;
    font-size: 14px;
    font-weight: bold;
    margin-top: 10px;
        bottom: 0;
    position: absolute;
    ">All Club</a>
                </section><!-- /.news-small -->
            </div><!-- /.col-md-4 -->




            <div class="col-md-4 col-sm-6" style="min-height: 391px;">
                <section class="events small" id="events-small">
                    <header>
                        <h2>Events</h2>
                        <a href="{{url('/calender')}}" class="link-calendar">Calendar <span class="glyphicon glyphicon-calendar"></span></a>
                    </header>
                    <div class="section-content">
                        @foreach($evenment as $key => $event)
                        @if($key == 0)
                        <article class="event nearest">
                            <figure class="date">
                                <div class="month">{{$event->month}}</div>
                                <div class="day">{{$event->day}}</div>
                            </figure>
                            <aside>
                                <header>
                                    <a href="">{{$event->Name}}</a>
                                </header>
                                <div class="additional-info">{{ optional($event->club)->name }}</div>
                            </aside>
                        </article><!-- /article -->
                        @elseif($key == 1)


                        <article class="event nearest-second">
                            <figure class="date">
                                <div class="month">{{$event->month}}</div>
                                <div class="day">{{$event->day}}</div>
                            </figure>
                            <aside>
                                <header>
                                    <a href="">{{$event->Name}} </a>
                                </header>
                                <div class="additional-info clearfix">{{ optional($event->club)->name }}</div>
                            </aside>
                        </article><!-- /article -->
                        @elseif($key == 2)
                        <article class="event">
                            <figure class="date">
                                <div class="month">{{$event->month}}</div>
                                <div class="day">{{$event->day}}</div>
                            </figure>
                            <aside>
                                <header>
                                    <a href="">{{$event->Name}}</a>
                                </header>
                                <div class="additional-info">{{ optional($event->club)->name }}</div>
                            </aside>
                        </article><!-- /article -->
                        @endif
                        @endforeach
                        <a href="{{url('/calender')}}" style="color: #252525;
    display: inline-block;
    font-size: 14px;
    font-weight: bold;
    margin-top: 10px;
        bottom: 0;
    position: absolute;
    ">Calendar</a>

                    </div><!-- /.section-content -->
                </section><!-- /.events-small -->
            </div><!-- /.col-md-4 -->





            <div class="col-md-4 col-sm-12" style="min-height: 391px;">
                <section id="about">
                    <header>
                        <h2>About Universo</h2>
                    </header>
                    <div class="section-content">
                        <img src="{{ asset('students.jpg')}}" alt="" class="add-margin">
                        <p><strong>Welcome o Universo.</strong> Premium HTML Template for schools, universieties and other educational institutes.
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec laoreet semper tincidunt.
                            Interdum et malesuada fames ac ante ipsum primis in faucibus. </p>
                        <a href="#" style="color: #252525;
    display: inline-block;
    font-size: 14px;
    font-weight: bold;
    margin-top: 10px;
        bottom: 0;
    position: absolute;
    ">Read More</a>
                    </div><!-- /.section-content -->
                </section><!-- /.about -->
            </div><!-- /.col-md-4 -->
        </div><!-- /.row -->
    </div><!-- /.container -->
</div>
<!-- end News, Events, About -->

<!-- Testimonial -->
<section id="testimonials">
   
</section>
<!-- end Testimonial -->


<!-- end Academic Life, Campus Life, Newsletter -->


<!-- end Divisions, Connect -->

<!-- end Our Professors, Gallery -->


<!-- end Partners, Make a Donation -->
</div>

@endsection