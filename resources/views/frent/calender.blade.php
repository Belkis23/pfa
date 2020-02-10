@extends('layouts.frent')

@section('content')

<!-- Page Content -->



    <div class="container">
        <div class="row">
            <!--MAIN Content-->
            <div class="col-md-8" style="min-height: 722px;">
                <div id="page-main">
                    <section class="event-calendar">
                        <header><h1>Events Calendar</h1></header>
                        <section id="event-calendar">
                          <div class="content">
                  <div id="calendar" name="calendar"></div>
                  </div>
                        </section>
                    </section><!-- /.event-calendar -->
                </div><!-- /#page-main -->
            </div><!-- /.col-md-8 -->

            <!--SIDEBAR Content-->
            <div class="col-md-4" style="min-height: 722px;">
                <div id="page-sidebar" class="sidebar">
                    <aside class="news-small" id="news-small">
                        <header>
                            <h2>Related News</h2>
                        </header>
                        <div class="section-content">
                            @foreach($evenment as $key => $evet)
                            @if($key < 8)
                            @if($evet->date >= Carbon\Carbon::now()->format('Y-m-d') )
                            <article>
                                <figure class="date"><span class="glyphicon glyphicon-calendar"></span>{{$evet->date}}</figure>
                                <header><a href="#">{{$evet->Name}}</a></header>
                            </article><!-- /article -->
                            @endif
                            @endif
                              @endforeach
                    
                        </div><!-- /.section-content -->
                      
                    </aside><!-- /.news-small -->
                    
                </div><!-- /#sidebar -->
            </div><!-- /.col-md-4 -->
            <!-- end SIDEBAR Content-->
        </div><!-- /.row -->
    </div><!-- /.container -->








<!-- end Partners, Make a Donation -->
</div>
<!-- end Page Content -->

@endsection

@section('js')

<script>
    $(document).ready(function() {

        // page is now ready, initialize the calendar...
        $('#calendar').fullCalendar({
            // put your options and callbacks here
            themeSystem: 'bootstrap4',

            header    : {
        left  : 'prev,next today',
        center: 'title',
        right : 'month,agendaWeek,agendaDay'
      },
      buttonText: {
        today: 'today',
        month: 'month',
        week : 'week',
        day  : 'day'
      },
            defaultView: 'month',
            events : [
                @foreach($evenment as $evet)
            
                {
                    title : '{{ $evet->Name }}',
                    start :  new Date({{ Carbon\Carbon::parse($evet->date)->format('Y') }},{{ Carbon\Carbon::parse($evet->date)->format('m')-1 }},{{ Carbon\Carbon::parse($evet->date)->format('d') }},'{{ Carbon\Carbon::parse($evet->Start)->format('H') }}','{{ Carbon\Carbon::parse($evet->Start)->format('i') }}'),


                   
                 end:new Date({{ Carbon\Carbon::parse($evet->date)->format('Y') }},{{ Carbon\Carbon::parse($evet->date)->format('m')-1 }},{{ Carbon\Carbon::parse($evet->date)->format('d')-1 }} ,{{ Carbon\Carbon::parse($evet->End)->format('H') }},{{ Carbon\Carbon::parse($evet->End)->format('i') }}),
                            
                        
          backgroundColor: "#f56900", //Info (aqua)
          borderColor    : "#f56954", //Info (aqua)
                           
                    
                },
                @endforeach
            ],
        });
    });
</script>


@endsection
