@extends('layouts.mainlayout')
@section('content')
    <body data-spy="scroll" data-target=".mainmenu-area">
    <!-- Preloader-content -->
    <div class="preloader">
        <span>WEVO</span>
    </div>
    <!-- MainMenu-Area -->
    <nav class="mainmenu-area" data-spy="affix" data-offset-top="200">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#primary_menu">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#"><img src="images/logo.png" alt="Logo"></a>
            </div>
            <div class="collapse navbar-collapse" id="primary_menu">
                <ul class="nav navbar-nav mainmenu">
                    <li class="active"><a href="#home_page">Home</a></li>
                    <li><a href="#about_page">About</a></li>
                    <li><a href="#features_page">Individuals</a></li>
                    <li><a href="#gallery_page">Organzations</a></li>
                    <li><a href="#price_page">Features</a></li>
                    <li><a href="#contact_page">Contacts</a></li>
                </ul>
                <div class="right-button hidden-xs">
                    <a href="{{ route('login') }}">Sign in</a>
                    <a href="{{ route('register') }}">Sign up</a>
                </div>
            </div>
        </div>
    </nav>
    <!-- MainMenu-Area-End -->
    <!-- Home-Area -->
    <header class="home-area overlay" id="home_page">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 hidden-sm col-md-5">
                    <figure class="mobile-image wow fadeInUp" data-wow-delay="0.2s">
                        <img src="images/header-mobile.png" alt="">
                    </figure>
                </div>
                <div class="col-xs-12 col-md-7">
                    <div class="space-80 hidden-xs"></div>
                    <h1 class="wow fadeInUp" data-wow-delay="0.4s" style="font-weight: 900;">Understand, impact and change.</h1>
                    <div class="space-20"></div>
                    <div class="desc wow fadeInUp" data-wow-delay="0.4s">
                        <p style="font-weight: 300;font-size: 26px;">
                            Connecting worldwide opinion through a decentralized and secure voting system
                        </p>
                    </div>
                    <div class="space-20"></div>
                    <a href="#" class="bttn-default wow fadeInUp" data-wow-delay="0.4s">For individuals</a>
                    <a href="#" class="bttn-default wow fadeInUp" data-wow-delay="0.4s">For organizations</a>

                </div>
            </div>
        </div>
    </header>
    <!-- Home-Area-End -->
    <!-- Gallery-Area -->
    <section class="gallery-area section-padding" id="about_page" style="    background: #fff;color: #000;">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xs-12 col-sm-6 gallery-slider">
                    <div class="gallery-slide">
                        <div class="item"><img src="images/gallery-1.png" alt=""></div>
                        <div class="item"><img src="images/gallery-2.png" alt=""></div>
                        <div class="item"><img src="images/gallery-3.png" alt=""></div>
                        <div class="item"><img src="images/gallery-1.png" alt=""></div>
                        <div class="item"><img src="images/gallery-2.png" alt=""></div>
                        <div class="item"><img src="images/gallery-3.png" alt=""></div>
                        <div class="item"><img src="images/gallery-1.png" alt=""></div>
                        <div class="item"><img src="images/gallery-2.png" alt=""></div>
                        <div class="item"><img src="images/gallery-3.png" alt=""></div>
                        <div class="item"><img src="images/gallery-1.png" alt=""></div>
                        <div class="item"><img src="images/gallery-3.png" alt=""></div>
                        <div class="item"><img src="images/gallery-2.png" alt=""></div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-5 col-lg-3" style="width: 40%;">
                    <div class="page-title">
                        <h5 class="white-color title wow fadeInUp" data-wow-delay="0.2s">About us</h5>
                        <div class="space-10"></div>
                        <h3 class="black-color wow fadeInUp" data-wow-delay="0.4s" style="color: #000;font-size: 35px;font-weight: 800;">Wevo gives access to a new opinion-sharing democracy</h3>
                    </div>
                    <div class="space-20"></div>
                    <div class="desc wow fadeInUp" data-wow-delay="0.6s">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiing elit, sed do eiusmod tempor incididunt ut labore et laborused sed do eiusmod tempor incididunt ut labore et laborused.</p>
                    </div>
                    <div class="space-50"></div>
                    <a href="#" class="bttn-default wow fadeInUp" data-wow-delay="0.4s">I'm a person</a>
                    <a href="#" class="bttn-default wow fadeInUp" data-wow-delay="0.4s">I'm an organization</a>

                </div>
            </div>
        </div>
    </section>
    <!-- Gallery-Area-End -->
<!-- For individuals -->
<section class="video-area section-padding" id="features_page">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-md-6">
                <div class="video-photo">
                    <img src="images/video-image.jpg" alt="">
                    <a href="https://www.youtube.com/watch?v=ScrDhTsX0EQ" class="popup video-button">
                        <img src="images/play-button.png" alt="">
                    </a>
                </div>
            </div>
            <div class="col-xs-12 col-md-5 col-md-offset-1">
                <div class="space-60 hidden visible-xs"></div>
                <div class="page-title">
                    <h5 class="title wow fadeInUp" data-wow-delay="0.4s">For individuals</h5>
                    <div class="space-10"></div>
                    <h3 class="dark-color wow fadeInUp" data-wow-delay="0.4s" style="color: #000;font-size: 35px;font-weight: 800;">Your opinion is so valuable</h3>
                    <div class="space-20"></div>
                    <div class="desc wow fadeInUp" data-wow-delay="0.4s">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiing elit, sed do eiusmod tempor incididunt ut labore et laborused sed do eiusmod tempor incididunt ut labore et laborused.</p>
                    </div>
                    <div class="space-50"></div>
                    <a href="#" class="bttn-default wow fadeInUp" data-wow-delay="0.4s">Learn More</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- For individuals-End -->
    <!-- For organisations -->
    <section id ="gallery_page" class="video-area section-padding" style="background-position: right center;">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-md-5 col-md-offset-1" style="    margin-left: 0%;">
                    <div class="space-60 hidden visible-xs"></div>
                    <div class="page-title">
                        <h5 class="title wow fadeInUp" data-wow-delay="0.4s">For organizations</h5>
                        <div class="space-10"></div>
                        <h3 class="dark-color wow fadeInUp" data-wow-delay="0.4s" style="color: #000;font-size: 35px;font-weight: 800;">Your service/product needs to evolve depending on the needs of your target</h3>
                        <div class="space-20"></div>
                        <div class="desc wow fadeInUp" data-wow-delay="0.4s">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiing elit, sed do eiusmod tempor incididunt ut labore et laborused sed do eiusmod tempor incididunt ut labore et laborused.</p>
                        </div>
                        <div class="space-50"></div>
                        <a href="#" class="bttn-default wow fadeInUp" data-wow-delay="0.4s">Learn More</a>
                    </div>
                </div>
                <div class="col-xs-12 col-md-6">
                    <div class="video-photo">
                        <img src="images/video-image.jpg" alt="">
                        <a href="https://www.youtube.com/watch?v=ScrDhTsX0EQ" class="popup video-button">
                            <img src="images/play-button.png" alt="">
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- For organisations-End -->
    <!-- Feature-Area -->
    <section class="feature-area section-padding-top" id="price_page">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-8 col-sm-offset-2">
                    <div class="page-title text-center">
                        <h5 class="title">Features</h5>
                        <div class="space-10"></div>
                        <h3 style="color: #000;font-weight: 800;font-size: 35px;">Created for community development</h3>
                        <div class="space-60"></div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-4">
                    <div class="service-box wow fadeInUp" data-wow-delay="0.2s">
                        <div class="box-icon">
                            <i class="lnr lnr-layers"></i>
                        </div>
                        <h4 style="font-weight: 700;">Fast &amp; Powerful</h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                    </div>
                    <div class="space-60"></div>
                    <div class="service-box wow fadeInUp" data-wow-delay="0.3s">
                        <div class="box-icon">
                            <i class="lnr lnr-users"></i>
                        </div>
                        <h4 style="font-weight: 700;">Open Insights</h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                    </div>
                    <div class="space-60"></div>
                    <div class="service-box wow fadeInUp" data-wow-delay="0.4s">
                        <div class="box-icon">
                            <i class="lnr lnr-database"></i>
                        </div>
                        <h4 style="font-weight: 700;">Secure Technology</h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                    </div>
                    <div class="space-60"></div>
                </div>
                <div class="hidden-xs hidden-sm col-md-4">
                    <figure class="mobile-image">
                        <img src="images/feature-image.png" alt="Feature Photo">
                    </figure>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-4">
                    <div class="service-box wow fadeInUp" data-wow-delay="0.2s">
                        <div class="box-icon">
                            <i class="lnr lnr-laptop-phone"></i>
                        </div>
                        <h4 style="font-weight: 700;">Easy To Use</h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                    </div>
                    <div class="space-60"></div>
                    <div class="service-box wow fadeInUp" data-wow-delay="0.3s">
                        <div class="box-icon">
                            <i class="lnr lnr-rocket"></i>
                        </div>
                        <h4 style="font-weight: 700;">Ongoing evolution</h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                    </div>
                    <div class="space-60"></div>
                    <div class="service-box wow fadeInUp" data-wow-delay="0.4s">
                        <div class="box-icon">
                            <i class="lnr lnr-chart-bars"></i>
                        </div>
                        <h4 style="font-weight: 700;">Analytics-driven solutions</h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                    </div>
                    <div class="space-60"></div>
                </div>
            </div>
        </div>
    </section>
    <!-- Feature-Area-End -->






@endsection
