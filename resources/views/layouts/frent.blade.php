

<!DOCTYPE html>
<!-- saved from url=(0051)http://www.themestarz.net/html/universo/index2.html -->
<html lang="en-US"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Theme Starz">

    <link href="{{ asset('css.css')}}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="{{ asset('bootstrap.css')}}" type="text/css">
    <link rel="stylesheet" href="{{ asset('selectize.css')}}" type="text/css">
    <link rel="stylesheet" href="{{ asset('owl.carousel.css')}}" type="text/css">
    <link rel="stylesheet" href="{{ asset('vanillabox.css')}}" type="text/css">
    <link rel="stylesheet" href="{{ asset('vanillabox.css')}}" type="text/css">

<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.css' />

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="{{ asset('style.css')}}" type="text/css">
 <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <title>Univers</title>
<style type="text/css">


</style>
</head>

<body class="page-homepage-carousel">
<!-- Wrapper -->
<div class="wrapper">
<!-- Header -->
<div class="navigation-wrapper">
     <div class="secondary-navigation-wrapper">
        <div class="container">
             @if(Auth::guard('etudiant')->check()) 
         
            <ul class="secondary-navigation list-unstyled pull-right">
                <li><a href="{{url('/profile')}}">My Profile</a></li>
                
                <li><a href="{{route('etudiant.logout')}}">Log Out</a></li>
            </ul>
            @endif
        </div>
    </div><!-- /.secondary-navigation -->
    <div class="primary-navigation-wrapper">
        <header class="navbar" id="top" role="banner">
            <div class="container">
                <div class="navbar-header">
                    <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".bs-navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <div class="navbar-brand nav" id="brand">
                        <a href="{{url('/')}}"><img src="{{ asset('logoenit.png')}}" alt="brand"></a>
                    </div>
                </div>
                <nav class="collapse navbar-collapse bs-navbar-collapse navbar-right" role="navigation">
                    <ul class="nav navbar-nav">
                        @if(Route::currentRouteName() == '/' )
                        <li class="active">
                        @else
                        <li class="">
                        @endif
                            <a href="{{url('/')}}">Home</a>

                           
                        </li>
                        @if(Route::currentRouteName() == 'calender' )
                        <li class="active">
                        @else
                        <li class="">
                        @endif
                            <a href="{{url('/calender')}}">calender</a>

                           
                        </li>


                       
                       
                    </ul>
                </nav><!-- /.navbar collapse-->
            </div><!-- /.container -->
        </header><!-- /.navbar -->
    </div><!-- /.primary-navigation -->
    <div class="background">
        <img src="{{ asset('background-city.png')}}" alt="background">
    </div>
</div>
<!-- end Header -->
<div id="page-content">
<!-- Slider -->
<div id="homepage-carousel">
    <div class="container">
        <div class="homepage-carousel-wrapper">
            <div class="row">
                <div class="col-md-6 col-sm-7" style="min-height: 320px;">
                    <div class="image-carousel owl-carousel owl-theme" style="display: block; opacity: 1;">
                        <div class="owl-wrapper-outer"><div class="owl-wrapper" style="width: 3330px; left: 0px; display: block; transition: all 800ms ease 0s; transform: translate3d(-1110px, 0px, 0px);"><div class="owl-item" style="width: 555px;"><div class="image-carousel-slide"><img src="{{ asset('slide-1.jpg')}}" alt=""></div></div><div class="owl-item" style="width: 555px;"><div class="image-carousel-slide"><img src="{{ asset('slide-2.jpg')}}" alt=""></div></div><div class="owl-item" style="width: 555px;"><div class="image-carousel-slide"><img src="{{ asset('slide-3.jpg')}}" alt=""></div></div></div></div>
                        
                        
                   
                </div><!-- /.slider-image -->
                </div><!-- /.col-md-6 -->
                <div class="col-md-6 col-sm-5" style="min-height: 320px;">
                    <div class="slider-content">
                        <div class="row">
                            <div class="col-md-12" style="min-height: 262px;">
                                 @if(!Auth::guard('etudiant')->check()) 
                                <h1>Join the comunity of modern thinking students</h1>
                            
                             <form id="slider-form"method="POST" action="{{ route('etudiant.login.submit') }}">
                              @csrf
                                    <div class="row">
                                       
                                        <div class="col-md-6" style="min-height: 50px;">
                                            <div class="input-group">
                                                <input class="form-control has-dark-background" name="email" id="email" placeholder="Email" type="email" required="">
                                            </div>
                                        </div><!-- /.col-md-6 -->

                                         <div class="col-md-6" style="min-height: 50px;">
                                            <div class="input-group">
                                                <input class="form-control has-dark-background" name="password" id="password" placeholder="Password" type="password" required="">
                                            </div>
                                        </div><!-- /.col-md-6 -->
                                    </div><!-- /.row -->
                                   
                                    <button type="submit"  class="btn btn-framed pull-right">Login</button>
                                    <div id="form-status"></div>
                                </form>
                              @endif
                            </div><!-- /.col-md-12 -->
                        </div><!-- /.row -->
                    </div><!-- /.slider-content -->
                </div><!-- /.col-md-6 -->
            </div><!-- /.row -->
            <div class="background"></div>
        </div><!-- /.slider-wrapper -->
        <div class="slider-inner"></div>
    </div><!-- /.container -->
</div>
<!-- end Slider -->
 @yield('content')
<!-- end Page Content -->

<!-- Footer -->
<footer id="page-footer">
    <section id="footer-top">
        <div class="container">
            <div class="footer-inner">
               
            </div><!-- /.footer-inner -->
        </div><!-- /.container -->
    </section><!-- /#footer-top -->

    <section id="footer-content">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-12" style="min-height: 255px;">
                    <aside class="logo">
                        <img src="{{ asset('logoenit.png')}}" class="vertical-center">
                    </aside>
                </div><!-- /.col-md-3 -->
                <div class="col-md-3 col-sm-4" style="min-height: 255px;">
                    <aside>
                        <header><h4>Contact Us</h4></header>
                        <address>
                            <strong>University of Universo</strong>
                            <br>
                            <span>4877 Spruce Drive</span>
                            <br><br>
                            <span>West Newton, PA 15089</span>
                            <br>
                            <abbr title="Telephone">Telephone:</abbr> +1 (734) 123-4567
                            <br>
                            <abbr title="Email">Email:</abbr> <a href="#">questions@youruniversity.com</a>
                        </address>
                    </aside>
                </div><!-- /.col-md-3 -->
                
               
            </div><!-- /.row -->
        </div><!-- /.container -->
        <div class="background"><img src="{{ asset('background-city.png')}}" class="" alt=""></div>
    </section><!-- /#footer-content -->

    <section id="footer-bottom">
        <div class="container">
            <div class="footer-inner">
            
            </div><!-- /.footer-inner -->
        </div><!-- /.container -->
    </section><!-- /#footer-bottom -->

</footer>
<!-- end Footer -->

</div>
<!-- end Wrapper -->

<script type="text/javascript" src="{{ asset('jquery-2.1.0.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('jquery-migrate-1.2.1.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('bootstrap.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('selectize.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('owl.carousel.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('jquery.validate.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('jquery.placeholder.js')}}"></script>
<script type="text/javascript" src="{{ asset('jQuery.equalHeights.js')}}"></script>
<script type="text/javascript" src="{{ asset('icheck.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('jquery.vanillabox-0.1.5.min.js')}}"></script>

<script type="text/javascript" src="{{ asset('custom.js')}}"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>

<script src='https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.1/moment.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.js'></script>

 @yield('js')
</body></html>